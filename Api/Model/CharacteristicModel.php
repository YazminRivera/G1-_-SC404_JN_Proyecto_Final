<?php
require_once PROJECT_ROOT_PATH . "/Data/Database.php";
 
class CharacteristicModel extends Database
{
    public function characteristicsInfo($id_property, $idCharacteristic)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_CharacteristicsInfo(?, ?)';
            $data = array('ii', array($id_property, $idCharacteristic));
            $Characteristic = $self->select($query, $data, false);

            
            $self->commitTransaction();

            return $Characteristic;

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

    public function addCharacteristic($characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive)
    {
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'call SP_AddCharacteristic(?, ?, ?, ?, ?)';
            $data = array('ssssi', array($characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive));
            $charactertistic = $self->select($query, $data, false);

            $self->commitTransaction();

            return $charactertistic;

        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    } 

    public function addCharacteristic_Property($idProperty, $id_characteristic, $characteristicValue, $characteristicApply, $dateRegistry, $userRegistry, $dateModify, $userModify)
    {
        $self = $this;

        try {

            $self->beginTransaction();

            $query = 'call SP_addCharacteristic_Property(?, ?, ?, ?, ?, ?, ?, ?)';
            $data = array('iisididi', array($idProperty, $id_characteristic, $characteristicValue, $characteristicApply, $dateRegistry, $userRegistry, $dateModify, $userModify));
            $Characteristic_Property = $self->execute($query, $data, false);

            $self->commitTransaction();
            
            return $Characteristic_Property;

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

    public function updateCharacteristicProperty($idProperty, $idCharacteristic, $characteristicValue, $characteristicApply, $dateModify, $userModify) {
   
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'CALL SP_UpdateCharacteristicProperty(?, ?, ?, ?, ?, ?)';
            $data = array('iisidi', array($idProperty, $idCharacteristic, $characteristicValue, $characteristicApply, $dateModify, $userModify));
            $upDateCharacteristic = $self->select($query, $data, false);

            $self->commitTransaction();
            
            return $upDateCharacteristic;
            
        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    }

    public function updateCharacteristic($idCharacteristic, $characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive) {
   
        $self = $this;

        try {

            $self->beginTransaction();
            
            $query = 'CALL SP_UpdateCharacteristic(?, ?, ?, ?, ?, ?)';
            $data = array('issssi', array($idCharacteristic, $characteristicName, $characteristicDescription, $characteristicIcon, $characteristicPath, $characteristicActive));
            $upDateCharacteristic = $self->select($query, $data, false);

            $self->commitTransaction();
            
            return $upDateCharacteristic;
            
        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }

    }

}