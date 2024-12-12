<?php

require __DIR__ . "/Inc/Module.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

//Validar la ruta del api
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$validRequest = requestValidations($uri);


if ($validRequest->code != 200) {
    header($validRequest->header);

    $error = $validRequest->messageError;
    echo (json_encode($validRequest));
    exit();
}

$uri = explode( '/', $uri);

//Configuración del api
require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/PropertyController.php";
require PROJECT_ROOT_PATH . "/Controller/Api/GeneralParameterController.php";
//require PROJECT_ROOT_PATH . "/Controller/Api/StorePriceController.php";
//require PROJECT_ROOT_PATH . "/Controller/Api/StoreController.php";

$objFeedController = '';

switch ($uri[2]) {
    case 'user':
        $objFeedController = new UserController();
        break;
    case 'property':
        $objFeedController = new PropertyController();
        break;
    case 'generalParameter':
        $objFeedController = new GeneralParameterController();
        break;
    /*case 'storePrice':
        $objFeedController = new StorePriceController();
        break;
    case 'store':
        $objFeedController = new StoreController();
        break;
    */    
}

$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}();


function requestValidations($uri) {

    /*Respuesta: Código 200, exitoso: true, Header: HTTP 1.1 200
    Respuesta: Código 404, exitoso: false, Error: Método no se encontró, Header: HTTP/1.1 404 Not Found
    Respuesta: Código 422, exitoso: false, Error: Method not supported, Header: HTTP/1.1 422 Unprocessable Entity
    Respuesta: Código 500, exitoso: false, Error:  , Header: HTTP/1.1 500 Internal Server Error*/

    //Variables y constantes
    $validRoute = true;

    define("GETMETHOD", 'GET');
    define("POSTMETHOD", 'POST');

    $mapRoute = array(
        "user/list" => GETMETHOD,
        "user/listPost" => POSTMETHOD,
        "user/login" => POSTMETHOD,
        "property/propertyInfo" => POSTMETHOD,
        "property/searchProperties" => GETMETHOD,
        "property/addProperty" => POSTMETHOD,
        "property/deleteProperty" => POSTMETHOD,
        "property/updateProperty" => POSTMETHOD,
        "generalParameter/getParametersHeader" => GETMETHOD,
        "property/uploadImages" => POSTMETHOD,
        "property/getPropertyInfoEdit" => POSTMETHOD,
        "property/uploadVideos" => POSTMETHOD
    );

    //Verificamos la ruta
    $methodRequest = requestValidateRoute($mapRoute, $uri);

    if ($methodRequest == '') {
        $validRoute = false;
        $response = requestProcessReturn(404, 0, 'Method not found', 'HTTP/1.1 404 Not Found');
    }

    //Validamos el método
    if ($validRoute) {
        $validMethod = requestValidateMethod($methodRequest);

        if ($validMethod == false) {
            $validRoute = false;

            $response = requestProcessReturn(422, 0, 'Method not supported', 'HTTP/1.1 422 Unprocessable Entity');
        }
    }

    //Si todo sale bien, seteamos la respuesta como exitosa
    if ($validRoute == true) {
        $response = requestProcessReturn(200, true, '', 'HTTP/1.1 200');
    }

    return $response;
}

function requestProcessReturn($code, $success, $messageError, $header) {

    $response = new ResponseRequestData();
    $response->code = $code;
    $response->success = $success;
    $response->messageError = $messageError;
    $response->header = $header;

    return $response;
}

function requestValidateRoute($mapRoute, $uri) {
    //Devuelvo el método para la ruta, si devuelve '' es porque no hay ruta y es incorrecta
    $uri = explode( '/', $uri);
    $routeName = $uri[2] . '/' . $uri[3];
    $result = $mapRoute[$routeName] ?? '';

    return $result;
}

function requestValidateMethod($methodRequest) {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    $method = $_SERVER["REQUEST_METHOD"];
    $validMethod = false;

    if (strtoupper($method) == $methodRequest) {
        $validMethod = true;
    }

    return $validMethod;
}

class ResponseRequestData {

    public $code = 0;
    public $success = false;
    public $messageError = '';
    public $header = '';

}

?>

