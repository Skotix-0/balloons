<?
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once($_SERVER['DOCUMENT_ROOT'].'/_api/ballons_api.php');

$ballons_api = new Ballons_API();

switch( $_REQUEST['func'] ){
    case 'getMainCategory':
            $ballons_api->getMainCategory();
        break;
    case 'getCategory':
            $ballons_api->getCategory($_REQUEST['parentId']);
        break;
    case 'setCategory':
            $ballons_api->setCategory();
        break;
    case 'setProducts':
            $ballons_api->setProducts();
        break;
    case 'getProducts':
            $ballons_api->getProducts( $_REQUEST['categoryId'] ,$_REQUEST['lastProduct'] );
        break;
    default:
        break;
}

