<?php
/*require PROJECT_ROOT_PATH . "/Model/ResponseData.php";*/

class GeneralParameterController extends BaseController
{
    public function getParametersHeaderAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $generalParameters = new GeneralParameterModel();
            $parametersHeader = $generalParameters->getParametersHeader();


            $responseData->success = true;
            $responseData->data = $parametersHeader;

        } catch(Error $e) {
            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }
     
    public function sendEmailAction() {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();
        $errorMessage = '';
        $success = false;

        try {

            $generalParameters = new GeneralParameterModel();

            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array
            $toEmail = $input-> toEmail;
            $subject = $input-> subject;
            $body = $input-> body;

            $errorMessage = $generalParameters->sendEmail($toEmail, $subject, $body);

            if ($errorMessage == '') {
                $success = true;
            } else {
                $responseData->messageError = $errorMessage;
            }

            $responseData->success = $success;
            $responseData->data = "";

        } catch(Error $e) {
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
?>