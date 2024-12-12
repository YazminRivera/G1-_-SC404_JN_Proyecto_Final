<?php
require_once PROJECT_ROOT_PATH . "/Data/Database.php";
 
class PropertyModel extends Database
{
    public function propertyInfo($idLanguage, $id_property)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_PropertyInfo(?, ?)';
            $data = array('ii', array($id_property, $idLanguage));
            $properties = $self->select($query, $data, false);

            
            $self->commitTransaction();

            return $properties;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    }

    public function listProperty($language)
    {

        try {

            $query = 'call SP_Get_Property_List("' . $language . '")';
            $data = []; 


            return $this->select($query, $data, false);
            


        } catch(Exception $e) {

            throw New Exception( $e->getMessage() );
        }

    }



    public function searchProperties($language) {

        $query = 'call Search_Properties("' . $language . '")';
        $data = [];
        return $this->select($query, $data, false);

    }

    public function inserImageProperty($id_property, $id_property_image, $image_name, $image_extension, $image_active, $is_image) {

        $self = $this;

        try {
            $self->beginTransaction();

            $query = 'call SP_Insert_Property_Image(?, ?, ?, ?, ?, ?)';
            $data = array('iissii', array($id_property, $id_property_image, $image_name, $image_extension, $image_active, $is_image));
            $property_image = $self->select($query, $data, false);

            $self->commitTransaction();

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

        return $property_image;
    }

    public function addProperty($property_id, $property_location, $property_price, $property_active, $property_currency, $user_registry)
    {
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'call SP_AddProperty(?, ?, ?, ?, ?, ?)';
            $data = array('isiisi', array($property_id, $property_location, $property_price, $property_active, $property_currency, $user_registry));
            $properties = $self->select($query, $data, false);

            $self->commitTransaction();

            return $properties;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    } 

    public function addPropertyDescription($property_id, $id_language, $property_description, $property_title)

    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_AddPropertyDescription(?, ?, ?, ?)';
            $data = array('iiss', array($property_id, $id_language, $property_description, $property_title));
            $properties = $self->execute($query, $data, false);

            $self->commitTransaction();

            return $properties;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    } 

    public function deleteProperty($id_property) {
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'call SP_DeleteProperty(?)';
            $data = array('i', array($id_property));
            $property = $self->execute($query, $data, false);
            
            $self->commitTransaction();

            return $property;
            
        } catch (Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }
    }

    public function updateProperty($id_property, $property_title, $property_description, 
    $property_location, $property_price, $property_active, $property_currency, 
    $user_modify, $date_modify, $id_language, $property_description_language, 
    $description_active) {
   
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'CALL SP_UpdateProperty(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $data = array('isssdisisisi', array($id_property, $property_title, $property_description, $property_location, $property_price, $property_active, $property_currency, $user_modify, 
            $date_modify, $id_language, $property_description_language, $description_active));
            $property = $self->select($query, $data, false);

            $self->commitTransaction();
            
            return $property;
            
        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    }

    public function getPropertyEdit($id_property)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_Get_Property_Info(?)';
            $data = array('i', array($id_property));
            $property = $self->select($query, $data, false);

            $self->commitTransaction();

            return $property;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }
    }
        
    public function getPropertyEditDescriptions($id_property)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_Get_Property_Description(?)';
            $data = array('i', array($id_property));
            $propertyDescriptions = $self->select($query, $data, false);

            $self->commitTransaction();

            return $propertyDescriptions;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    }

    public function getPropertyEditImages($id_property)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_Get_Property_Images(?)';
            $data = array('i', array($id_property));
            $propertyImages = $self->select($query, $data, false);

            $self->commitTransaction();

            return $propertyImages;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }
    }

    public function getPropertyEditVideos($id_property)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_Get_Property_Videos(?)';
            $data = array('i', array($id_property));
            $propertyVideos = $self->select($query, $data, false);

            $self->commitTransaction();

            return $propertyVideos;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }
    }

    /*Likes para propiedades */
    public function insertLikeProperty($id_property, $is_sum, $machine_description) {

        $self = $this;

        try {
            $self->beginTransaction();

            $query = 'call SP_PropertyLikeInsert(?, ?, ?)';
            $data = array('iis', array($id_property, $is_sum, $machine_description));
            $inserted = $self->select($query, $data, false);

            $self->commitTransaction();

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

        return $inserted;
    }
}