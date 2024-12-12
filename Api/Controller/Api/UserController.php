<?php
/*require PROJECT_ROOT_PATH . "/Model/ResponseData.php";*/

class UserController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users. API para prototipos de APIS
     */
    public function listAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $userModel = new UserModel();

            $intLimit = 10;
            if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                $intLimit = $arrQueryStringParams['limit'];
            }

            $arrUsers = $userModel->getUsers();

            $responseData->success = true;
            $responseData->data = $arrUsers;
        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }

    /**
     * "/user/listPost" Endpoint - Get list of users. API para prototipos de APIS
     */
    public function listPostAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            echo ($input->pruebas);
            echo ($input->pruebas2);
        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }

    /* Log */
    public function loginAction()
    {
        $responseData = new ResponseData();
        $responseJson;

        $arrQueryStringParams = $this->getPostQueryStringParams();

        try {
            $email = $arrQueryStringParams->email;
            $password = $arrQueryStringParams->pass;

            $userModel = new UserModel();
            $userResponse = $userModel->login($email, $password);

            $responseData->success = true;
            $responseData->data = $userResponse;


            

            /*if (!empty($email)) {
                //    $arrUsers = $UserModel->login2($email);
            }*/

            /*$property = new PropertyModel();
            

            


            $responseData->success = true;
            //$responseData->data = $arrUsers;*/

        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }
        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }
    /* End Log*/

    /* Signup */
    public function signupAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $UserModel = new UserModel();

            $idUser = $arrQueryStringParams['idUser'];
            $name = $arrQueryStringParams['name'];
            $active = $arrQueryStringParams['active'];
            $email = $arrQueryStringParams['email'];
            $phone = $arrQueryStringParams['phone'];
            $userCode = $arrQueryStringParams['userCode'];
            $password = $arrQueryStringParams['password'];

            $arrUsers = $UserModel->signup($idUser, $name, $active, $email, $phone, $userCode, $password);

            $responseData->success = true;
            $responseData->data = $arrUsers;
        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }
        /*$responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );*/
    }
    /* End Signup*/

    /**
     * "/user/login" Endpoint - Get list of users. API para prototipos de APIS
     */
    public function loginPostAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $userModel = new UserModel();
            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array

            //a partir de aqui
            $email = $input->email;
            $password = $input->password;


            //encriptar el password
            //$passwordEncrypted = password_hash($password, PASSWORD_BCRYPT);    

            //seleccionamos el usuario desde BD
            $arrUsers = $userModel->login($email, $password);

            if (count($arrUsers) == 0) {
                $responseData->messageError = 'Los datos del usuario son inválidos';
            } else {

                //validar contrase a
                /*print_r($arrUsers[0]);*/


                //echo ($arrUsers[0]['id_user']);

                //si la contrase a es ok devolver esto:
                $responseData->data = $arrUsers;
                $responseData->success = true;
            }
        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }

    public function saveUserPostAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $userModel = new UserModel();
            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array

            //a partir de aqui
            $idUser = $input->idUser;
            $email = $input->email;
            $password = $input->password;
            $phone = $input->phone;
            $name = $input->name;
            $userCode = $input->userCode;

            $arrVerify = $userModel->verify($email);

            //$arrID = $userModel->ultimoRegistro();
            if (count($arrVerify) == 1) {

                $responseData->messageError = "No se puede registrar el usuario porque ya existe con el correo electrónico";
                //$responseData->messageError = $userModel->ultimoRegistro();
                //$responseData->data = $arrID[0];
            } else {
                //seleccionamos el usuario desde BD
                $arrUsers = $userModel->saveUser($idUser, $email, $password, $phone, $name, $userCode);
                $responseData->success = true;
            }
        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }


    public function getIDAction()
    {
        $responseData = new ResponseData();
        $responseJson;


        try {

            $UserModel = new UserModel();

            $arrUsers = $UserModel->ultimoRegistro();


            $responseData->success = true;
            $responseData->data = $arrUsers;

            //

        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }
        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }

    public function getUserAction()
    {
        $responseData = new ResponseData();
        $responseJson;


        try {

            $UserModel = new UserModel();

            $arrUsers = $UserModel->ultimoRegistro();


            $responseData->success = true;
            $responseData->data = $arrUsers;

            //

        } catch (Error $e) {

            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }
        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }
}
