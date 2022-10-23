<?

class Ballons_API
{

    private $adapter;
    private $xmlFile;

    public function __construct()
    {
        $this->connectToDB(); 
    }

    public function connectToDB(){
        $config = require_once( $_SERVER['DOCUMENT_ROOT'].'/bd_config/config.php' );
        $dns = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].'';
        $this->adapter = new PDO($dns, $config['username'], $config['password']);
        $this->xmlFile = simplexml_load_file('full-export-detail.xml');
    }

    public function setCategory()
    {
        $mainCategoryArrayQuery = $this->adapter->query("
            SELECT 
                bmc_category_id as category_id
            FROM 
                `balloons_main_categorys` 
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach( $mainCategoryArrayQuery as $category_item ){
            $mainCategory[] = $category_item['category_id'];
        }

        $this->adapter->query("TRUNCATE TABLE `ballons`.`balloons_categorys` ");

        foreach ($this->xmlFile->shop->categories->category as $category_item) {
            if (in_array($category_item['parentId'], $mainCategory)) {
                $query = "
                    INSERT 
                    INTO 
                        `balloons_categorys` 
                    SET
                        bc_category_id = :category_id,
                        bc_category_title = :category_title,
                        bc_category_parent_id = :parent_id,
                        bc_fl_show = 1,
                        bc_image_url = 'https://vozdushnoe-buro.ru/wp-content/uploads/2020/01/11111.png'
                ";
                $params = [
                    ':category_id' => (int)$category_item['id'],
                    ':category_title' => (string)$category_item,
                    ':parent_id' => (int)$category_item['parentId']
                ];
                $stmt = $this->adapter->prepare($query);
                $stmt->execute($params);
            }
        }
    }

    public function getMainCategory(){
        $categorysData = $this->adapter->query("
            SELECT 
                bmc_category_id as category_id,
                bmc_category_title as category_title,
                bmc_vue_id as vue_id
            FROM 
                `balloons_main_categorys` 
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach( $categorysData as $category_item ){
            $mainCategoryArray[] = [
                'category_id' => $category_item['category_id'],
                'category_title' => $category_item['category_title'],
                'vue_id' => $category_item['vue_id'],
            ];
        }
        print_r($mainCategoryArray);
        die();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode( $mainCategoryArray );
    }

    public function getCategory($parentId)
    {
        $categorysData = $this->adapter->query("
            SELECT 
                bc_category_id as category_id,
                bc_category_parent_id as parent_id,
                bc_category_title as category_title,
                bc_image_url
            FROM 
                `balloons_categorys` 
            WHERE 
                bc_fl_show = 1
            AND
                bc_category_parent_id = ".(int)$parentId."
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach( $categorysData as $category_item ){
            $dataArray[] = [
                'id' => $category_item['category_id'],
                'title' => $category_item['category_title'],
                'imgUrl' => $category_item['bc_image_url'],
            ];
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode( $dataArray );
    }

    public function setProducts(){
        $categoryIdArrayQuery = $this->adapter->query("
            SELECT 
                bc_category_id as category_id
            FROM 
                `balloons_categorys` 
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach( $categoryIdArrayQuery as $category_item ){
            $categoryIdArray[] = $category_item['category_id'];
        }

        $this->adapter->query("TRUNCATE TABLE `ballons`.`ballons_products` ");

        foreach ($this->xmlFile->shop->offers->offer as $offer_item) {
            if( in_array( $offer_item->categoryId, $categoryIdArray ) && (int)$offer_item->param[0] === 1 ){
                $query = "
                    INSERT 
                    INTO 
                        `ballons_products` 
                    SET
                        bp_id = :bp_id, 	
                        bp_picture_url = :bp_picture_url, 	
                        bp_price = :bp_price, 	
                        bp_category_id = :bp_category_id, 	
                        bp_currency = :bp_currency, 	
                        bp_name = :bp_name, 	
                        bp_country_of_origin = :bp_country_of_origin, 	
                        bp_param_count = :bp_param_count,
                        bp_param_size = :bp_param_size

                ";
                $params = [
                    ':bp_id' => (int)$offer_item['id'],
                    ':bp_picture_url' => $offer_item->picture,
                    ':bp_price' => $offer_item->price,
                    ':bp_category_id' => (int)$offer_item->categoryId,
                    ':bp_currency' => $offer_item->currencyId,
                    ':bp_name' => $offer_item->name,
                    ':bp_country_of_origin' => $offer_item->country_of_origin,
                    ':bp_param_count' => (int)$offer_item->param[0],
                    ':bp_param_size' => $offer_item->param[1],
                ];

                $stmt = $this->adapter->prepare($query);
                $stmt->execute($params);
            }
        }
    }

    public function getProducts( $categoryId = null, $lastProduct = null, $countProduct = 20 ){

        if( !isset($categoryId) || !isset($lastProduct) ){
            echo '<p>Ошибка! Недостаточно входных данных для метода getProducts!</p>';
            return false;
        }

        $productArrayQuery = $this->adapter->query("
            SELECT 
                *
            FROM 
                `ballons_products` 
            WHERE
                bp_category_id = ".(int)$categoryId."
            GROUP BY
                bp_name, bp_param_size
            LIMIT ".$lastProduct.", ".$countProduct."
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach( $productArrayQuery as $product_item ){
            $code_match = array(' ','-', '"', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', ';', "'", ',', '.', '/', '', '~', '`', '=');
	        $arrayName = str_replace($code_match, '', $product_item['bp_name']);
            
            $resultArray[ $arrayName ]['image_url'] =  $product_item['bp_picture_url'];
            $resultArray[ $arrayName ]['bp_id'] = $product_item['bp_id'];
            $resultArray[ $arrayName ]['bp_name'] =  $product_item['bp_name'];
            $resultArray[ $arrayName ]['products'][] =  $product_item;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode( $resultArray );
        // print_r( $resultArray );
    }
}
