<?php
/*require PROJECT_ROOT_PATH . "/Model/ResponseData.php";*/

class CharacteristicController extends BaseController
{

    /* Buscar casa */
    public function characteristicsInfoAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $characteristicModel = new CharacteristicModel();
            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array

            $id_property = $input->id_property;
            $idCharacteristic = $input-> id_Characteristic;
            $idLenguage = $input->language;

            if ($idLenguage == "en") {
                
                $arrcharacteristics = $characteristicModel->characteristicsInfo(1, $id_property);
                $responseData->success = true;
                $responseData->data = $arrcharacteristics;                
            } elseif ($idLenguage == "es") {
                
                $arrcharacteristics = $characteristicModel->characteristicsInfo(2, $id_property);
                $responseData->success = true;
                $responseData->data = $arrcharacteristics;  
                
            } else {
                $responseData->success = false;
                $responseData->messageError =  $e->getMessage();
                $responseData->data = $arrcharacteristics;  
            }


        } catch (Error $e) {
            error_log("Error en propertyInfo: " . $e->getMessage());
            $responseData->success = false;
            $responseData->messageError =  $e->getMessage();
        }

        $responseJson = json_encode($responseData);
        $this->sendOutput(
            $responseJson,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }

    public function listCharacteristicsAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $language = $arrQueryStringParams["language"];

            $property = new PropertyModel();
            $parametersHeader = $property->listProperty($language);
    
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


    /* Agregar Casa */
    public function addCharacteristicAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $characteristicModel = new CharacteristicModel();

            //union de tablas
            //$idPropertyCharacteristic = $input -> id_property_characteristic;
            $idProperty = $input -> id_property;
            //$idCharacteristic = $input -> id_characteristic;
            $characteristicValue = $input -> characteristic_value;
            $characteristicApply = $input -> characteristic_apply;
            $dateRegistry = $input -> date_registry;
            $userRegistry = $input -> user_registry;
            $dateModify = $input -> date_modify;
            $userModify = $input -> user_modify;

            //tabla de caracteristicas
            $characteristicName = $input -> characteristic_name;
            $characteristicDescription = $input->characteristic_description;
            $characteristicIcon = $input -> characteristic_icon;
            $characteristicPath = $input -> characteristic_path;
            $characteristicActive = $input -> characteristic_active;



            $id_Character = $characteristicModel->addCharacteristic($characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive);
            
            $characteristicModel = new CharacteristicModel();
            $characteristicModel->addCharacteristic_Property($idProperty, $id_Character, $characteristicValue, $characteristicApply, $dateRegistry, $userRegistry, $dateModify, $userModify);

            //$arrProperty =
            //$property_id = $arrProperty[0]["id_property"];

            // //Detalles
            // $property_descriptions = $input -> propertyDescription;

            // for ($i = 0; $i < count($property_descriptions); $i++) {
            //     $currentDescription = $property_descriptions[$i];

            //     $property_title = $currentDescription->property_title;
            //     $property_description = $currentDescription->property_description;
            //     $id_language = $currentDescription->id_language;
                
            //     $newPropertyModel = new PropertyModel();
            //     $newPropertyModel->addPropertyDescription($property_id, $id_language, $property_description, $property_title);
            // }

            /*$id_language = $input -> id_language;
            $property_title_description = $input -> property_title_description;
            $property_description_language = $input -> property_description_language;
            $description_active = $input -> description_active;
            // TABLA Property_Description
            $arrProperty_Description = array( 
            $id_language,
            $property_title_description,
            $property_description_language,
            $description_active);*/

            

            $responseData->success = true;
            //$responseData->data = $arrProperty;                                             
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

    /* Update */
    public function updateCharacteristicAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $characteristicModel = new CharacteristicModel();

            //union de tablas
            //$idPropertyCharacteristic = $input -> id_property_characteristic;
            $idProperty = $input -> id_property;
            $idCharacteristic = $input -> id_characteristic;
            $characteristicValue = $input -> characteristic_value;
            $characteristicApply = $input -> characteristic_apply;
            $dateRegistry = $input -> date_registry;
            $userRegistry = $input -> user_registry;
            $dateModify = $input -> date_modify;
            $userModify = $input -> user_modify;

            //tabla de caracteristicas
            $characteristicName = $input -> characteristic_name;
            $characteristicDescription = $input->characteristic_description;
            $characteristicIcon = $input -> characteristic_icon;
            $characteristicPath = $input -> characteristic_path;
            $characteristicActive = $input -> characteristic_active;


            $characteristicModel->updateCharacteristicProperty($idProperty, $idCharacteristic, $characteristicValue, $characteristicApply, $dateModify, $userModify);
            $characteristicModel->updateCharacteristic($idCharacteristic, $characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive);
            
            

            //$arrProperty =
            //$property_id = $arrProperty[0]["id_property"];

            // //Detalles
            // $property_descriptions = $input -> propertyDescription;

            // for ($i = 0; $i < count($property_descriptions); $i++) {
            //     $currentDescription = $property_descriptions[$i];

            //     $property_title = $currentDescription->property_title;
            //     $property_description = $currentDescription->property_description;
            //     $id_language = $currentDescription->id_language;
                
            //     $newPropertyModel = new PropertyModel();
            //     $newPropertyModel->addPropertyDescription($property_id, $id_language, $property_description, $property_title);
            // }

            /*$id_language = $input -> id_language;
            $property_title_description = $input -> property_title_description;
            $property_description_language = $input -> property_description_language;
            $description_active = $input -> description_active;
            // TABLA Property_Description
            $arrProperty_Description = array( 
            $id_language,
            $property_title_description,
            $property_description_language,
            $description_active);*/

            

            $responseData->success = true;
            //$responseData->data = $arrProperty;                                             
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

    /* Delete */
    public function deleteCharacteristicAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $characteristicModel = new CharacteristicModel();

            $id_property_delete = $input->id_property_delete;

        
            $arrProperty = $propertyModel->delete($id_property_delete);

            $responseData->success = true;
           
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
