<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include main configuration file
require_once PROJECT_ROOT_PATH . "Inc/Config.php";
 
// include the base controller file
require_once PROJECT_ROOT_PATH . "Controller/BaseController.php";

// include generic response data
require_once PROJECT_ROOT_PATH . "Model/ResponseData.php";

// include the use model file
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";

// include the reservation model file
require_once PROJECT_ROOT_PATH . "Model/PropertyModel.php";

// include the general parameters model file
require_once PROJECT_ROOT_PATH . "Model/GeneralParameterModel.php";

// include the store price model file
require_once PROJECT_ROOT_PATH . "/Model/CharacteristicModel.php";

// include the store price model file
//require_once PROJECT_ROOT_PATH . "/Model/StoreModel.php";

/* Funciones generales */
function PrepareStoredProcedure($spName, $vars) {

    $sb = new StringBuilder();
    $sb->append("CALL ");
    $sb->append($spName);

    foreach ($vars as &$currentValue) {
        $newValue = '';

        if (is_bool($currentValue)) {
            if ($currentValue) {
                $newValue = 1;
            } else { 
                $newValue = 0;
            }
        } else if (is_numeric($currentValue)) {
            $newValue = $currentValue;
        } else {
            $newValue = "'" . $currentValue . "'";   
        }

        $sb->append($newValue);
    }

    return $sb->toString();
}

?>