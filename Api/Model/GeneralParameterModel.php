<?php
require_once PROJECT_ROOT_PATH . "/Data/Database.php";

class GeneralParameterModel extends Database {

    public function __construct() {
        
    }

    public function getParametersHeader() {
        return $this->select("call  SP_Get_Header_Parameters();");

    }

    public function sendEmail($toEmail, $subject, $body) {

        $headers = 'From: info@asgnosara.com' . "\r\n" .
                    'Reply-To: info@asgnosara.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $errorMessage = '';
        $success = mail($toEmail, $subject, $body, $headers);
        
        if (!$success) {
            $errorMessage = error_get_last()['message'];
        }

        return $errorMessage;
    } 
}



?>