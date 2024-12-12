<?php
/*require PROJECT_ROOT_PATH . "/Model/ResponseData.php";*/

class PropertyController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users. API para prototipos de APIS
     */
    /* Buscar casa */
    public function propertyInfoAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $propertyModel = new PropertyModel();
            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array

            $id_property = $input->id_property;
            $idLenguage = $input->language;

            if ($idLenguage == "en") {
                
                $arrProperty = $propertyModel->propertyInfo(1, $id_property);
                $responseData->success = true;
                $responseData->data = $arrProperty;                
            } elseif ($idLenguage == "es") {
                
                $arrProperty = $propertyModel->propertyInfo(2, $id_property);
                $responseData->success = true;
                $responseData->data = $arrProperty;  
                
            } else {
                $responseData->success = false;
                $responseData->messageError =  $e->getMessage();
                $responseData->data = $arrProperty;  
            }

            // Obtén la primera fila del primer conjunto de resultados.

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

    public function listPropertyAction()
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


    /**
     * "/user/listPost" Endpoint - Get list of users. API para prototipos de APIS
     */
    /* Agregar Casa */
    public function addPropertyAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $propertyModel = new PropertyModel();
            $property = $input -> property;

            //Encabezado
            $property_title = '';
            $property_description = '';
            $id_property = $property->id_property;
            $property_location = $property -> property_location;
            $property_price = $property -> property_price;
            $property_active = $property -> property_active;
            $property_currency = $property -> property_currency;
            $user_registry = $property -> id_user;

            $arrProperty = $propertyModel->addProperty($id_property, $property_location, $property_price, $property_active, $property_currency, $user_registry);
            $property_id = $arrProperty[0]["id_property"];

            //Detalles
            $property_descriptions = $input -> propertyDescription;

            for ($i = 0; $i < count($property_descriptions); $i++) {
                $currentDescription = $property_descriptions[$i];

                $property_title = $currentDescription->property_title;
                $property_description = $currentDescription->property_description;
                $id_language = $currentDescription->id_language;
                
                $newPropertyModel = new PropertyModel();
                $newPropertyModel->addPropertyDescription($property_id, $id_language, $property_description, $property_title);
            }

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
            $responseData->data = $arrProperty;                                             
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
    public function deletePropertyAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $propertyModel = new PropertyModel();

            $id_property_delete = $input->id_property_delete;

        
            $arrProperty = $propertyModel->deleteProperty($id_property_delete);

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

    

    /* Update */
    public function updatePropertyAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $propertyModel = new PropertyModel();

            $id_property = $input -> id_property;
            $property_title = $input -> property_title;
            $property_description = $input -> property_description;
            $property_location = $input -> property_location;
            $property_price = $input -> property_price;
            $property_active = $input -> property_active;
            $property_currency = $input -> property_currency;


            // TABLA Property_Description
            $id_language = $input -> id_language;
            $property_description_language = $input -> property_description_language;
            $description_active = $input -> description_active;
            
            $user_modify = $input -> user_modify;
            $date_modify = $input -> date_modify;


            $arrProperty = $propertyModel->updateProperty($id_property, $property_title, $property_description, 
                                                        $property_location, $property_price, $property_active, $property_currency, 
                                                        $user_modify, $date_modify, $id_language, $property_description_language, 
                                                        $description_active);
            
            $responseData->success = $arrProperty;
            $responseData->data = $arrProperty;
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
   

    public function searchPropertiesAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $language = $arrQueryStringParams["language"];
            $property = new PropertyModel();
            $parametersHeader = $property->searchProperties($language);

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

    public function uploadImagesAction() {

        //echo ('uploads\n');

        $responseData = new ResponseData();
        $responseJson;

        try {

            $imageInfo = $_POST["imageInfo"];
            $input = json_decode($imageInfo); //convert JSON into array
            $imagesResult = array();

            //print_r($input);
            //print_r($_FILES);
            //$data = json_decode(file_get_contents('php://input'), true);

            $i = 0;
        
            //TODO: Html y js para hacer funcionar la subida de imagenes de manera dinamica
            //TODO: Correcciones de Don LUIS

            foreach($_FILES as $file){

                //echo ('<br>imagen #' . $i . "<br>");
                $currentFile = $input->imagesList[$i];
                $currentImageResult = new StdClass();
                /*print_r($file);
                echo ('<br>');*/

                $id_property = $input->id_property;
                $id_property_image = $currentFile->id_property_image;  
                $image_name = basename($file["name"]);
                //echo ("<br>fileName: " . $image_name);
                $image_extension = str_replace("image/", "",  $file["type"]);
                //echo ("<br>fileExtension: " . $image_extension . '   -  ' . $file["type"]);
                $image_active = (($currentFile->image_active == 1) ? true : false);
                $is_image = true;

                //print_r($currentFile);
                //echo ('id_property ' . $id_property . ', id_property_image ' . $id_property_image . ', image_active ' . $image_active . '      ');

                $propertyModel = new PropertyModel();
                $imageResult =  $propertyModel->inserImageProperty($id_property, $id_property_image, $image_name, $image_extension, $image_active, $is_image);                

                if (count($imageResult) > 0 && $id_property_image == 0) {
                    $currentImageResult->image_number = $imageResult[0]["image_number"];
                    $imageName = 'i' . $id_property . '_' . $currentImageResult->image_number . '.' . $image_extension;
                    $target_file =   __DIR__ . "/uploads/images/" . $imageName;
                    //echo ('target: ' . $target_file);

                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        $currentImageResult->uploaded = true;
                    } else {
                        $currentImageResult->uploaded = false;
                    }
                } else {
                    $currentImageResult->uploaded = false;
                }
                
                $i++;

                array_push($imagesResult, $currentImageResult);   
            }

            $responseData->success = true;
            $responseData->data = $imagesResult;

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

    public function uploadVideosAction() {

        //echo ('uploads\n');

        $responseData = new ResponseData();
        $responseJson;

        try {

            $videoInfo = $_POST["videoInfo"];
            $input = json_decode($videoInfo); //convert JSON into array
            $videosResult = array();

            $i = 0;
        
            //TODO: Html y js para hacer funcionar la subida de imagenes de manera dinamica
            //TODO: Correcciones de Don LUIS

            foreach($_FILES as $file){

                //echo ('<br>imagen #' . $i . "<br>");
                $currentFile = $input->videosList[$i];
                $currentVideoResult = new StdClass();

                $id_property = $input->id_property;
                $id_property_image = $currentFile->id_property_image;  
                $image_name = basename($file["name"]);
                $image_extension = str_replace("video/", "",  $file["type"]);
                $image_active = (($currentFile->image_active == 1) ? true : false);
                $is_image = false;

                $propertyModel = new PropertyModel();
                $videoResult =  $propertyModel->inserImageProperty($id_property, $id_property_image, $image_name, $image_extension, $image_active, $is_image);                

                if (count($videoResult) > 0 && $id_property_image == 0) {
                    $currentVideoResult->image_number = $videoResult[0]["image_number"];
                    $imageName = 'v' . $id_property . '_' . $currentVideoResult->image_number . '.' . $image_extension;
                    $target_file =   __DIR__ . "/uploads/videos/" . $imageName;
                    //echo ('target: ' . $target_file);

                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        $currentVideoResult->uploaded = true;
                    } else {
                        $currentVideoResult->uploaded = false;
                    }
                } else {
                    $currentVideoResult->uploaded = false;
                }
                
                $i++;

                array_push($videosResult, $currentVideoResult);   
            }

            $responseData->success = true;
            $responseData->data = 1;

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
        
    public function getPropertyInfoEditAction() {

        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            
            $inputJSON = file_get_contents('php://input'); //extraer datos del cuerpo del request
            $input = json_decode($inputJSON); //convert JSON into array
            $id_property = $input-> id_property;

            $propertyModelHeader = new PropertyModel();
            $property = $propertyModelHeader->getPropertyEdit($id_property);

            /*$property = new strClass();
            $property->id_property = $propertyArray[0]->id_property;
            $property->property_title = $propertyArray[0]->property_title;
            $property->property_description = $propertyArray[0]->property_description;
            $property->property_location = $propertyArray[0]->property_location;
            $property->property_price = $propertyArray[0]->property_price;
            $property->property_active = $propertyArray[0]->property_active;
            $property->property_currency = $propertyArray[0]->property_currency;*/

            $propertyModelDescriptions = new PropertyModel();
            $propertyDescriptions = $propertyModelDescriptions->getPropertyEditDescriptions($id_property);

            $propertyModelImages = new PropertyModel();
            $propertyImages = $propertyModelImages->getPropertyEditImages($id_property);

            $propertyModelVideos = new PropertyModel();
            $propertyVideos = $propertyModelVideos->getPropertyEditVideos($id_property);

            $propertyInfo = new stdClass();
            $propertyInfo->property = $property[0];
            $propertyInfo->propertyDescriptions = $propertyDescriptions;
            $propertyInfo->propertyImages = $propertyImages;
            $propertyInfo->propertyVideos = $propertyVideos;

            $responseData->success = true;
            $responseData->data = $propertyInfo;

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

    //Likes de propiedades
    public function insertPropertyLikeAction()
    {
        $responseData = new ResponseData();
        $responseJson;
        $arrQueryStringParams = $this->getQueryStringParams();

        try {

            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON); //convert JSON into array

            $propertyModel = new PropertyModel();
            $property = $input -> propertyLike;

            //Encabezado
            $id_property = $property->id_property;
            $is_sum = $property -> is_sum;
            $machine_description = $property -> machine_description;
            
            $arrProperty = $propertyModel->insertLikeProperty($id_property, $is_sum, $machine_description);

            //Detalles
            $responseData->success = true;
            $responseData->data = $arrProperty;                                             
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
