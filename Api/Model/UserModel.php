<?php
require_once PROJECT_ROOT_PATH . "/Data/Database.php";
 
class UserModel extends Database
{
    public function __constructor () {
        
    }

    public function getUsers()
    {
        //return $this->select("SELECT * FROM users ORDER BY user_name ASC LIMIT ?", ["i", $limit]);
        return $this->select("select * from Users");

    }

    public function login($email, $password) {

        $self = $this;

        //encriptamos la contraseña
        //const passEncrypted = encriptModel.encript(pass);

        try {

            $query = 'Select id_user, user_email FROM Users WHERE user_email = "' . $email . '" AND user_password = "' . $password . '"';
            $data = [];
            $users = $self->select($query, $data, false);


            return $users;

        } catch(Exception $e) {

            throw New Exception( $e->getMessage() );
        }
    }

    public function signup($idUser, $name, $active, $email, $phone, $userCode, $password) {
        return $this->select("INSERT INTO Users(id_user, user_name, user_active, user_email, user_phone, user_code, user_password) VALUES ($idUser, '$name', $active, '$email', '$phone', '$userCode', '$password')");
    }

    public function saveUser($idUser, $email, $password, $phone, $name, $userCode) {
        /*$self = $this;

        try {
            $self->beginTransaction();

            /*$query = 'call SP_Save_Generate_Reservation (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $data = array('sssisssiddddddddiiddddd', array($clientName, $clientEmail, $clientPhone, $idStore, $reservationComment,
                                                            $dateStart, $dateEnd, $amount, $priceUnit, $percDiscountUnit,
                                                            $percTaxIvaUnit, $percTaxServiceUnit, $discountUnit, $taxIvaUnit, $taxServiceUnit, 
                                                            $priceNetUnit, $adultAmount, $childrenAmount, $totalPrice, $totalDiscount, 
                                                            $totalTaxIva, $totalTaxService, $totalPriceNet));
            $reservation = $self->select($query, $data, false);

            $query = "INSERT INTO Users(id_user, user_name, user_active, user_email, user_phone, user_code, user_password) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $data = array('isissss', array($idUser+1, $name, 1, $email, $phone, $userCode, $password));
            $reservation = $self->execute($query, $data, false);

            
            $self->commitTransaction();

            return $reservation;
        } catch(Exception $e) {
            $self->rollbackTransaction();

            throw New Exception( $e->getMessage() );
        }  */

        return $this->execute("INSERT INTO Users(id_user, user_name, user_active, user_email, user_phone, user_code, user_password) VALUES ($idUser+1, '$name', 1, '$email', '$phone', '$userCode', '$password')");
        //return $reservation;           


    }

    public function verify($email) {
        return $this->select("Select user_email FROM Users WHERE user_email = ('" . $email . "')");
    }

    public function ultimoRegistro() {
        return $this->select("Select id_user from Users order by id_user DESC LIMIT 1");
    }

    /*    public function saveUser($idUser, $email, $password, $phone, $name, $userCode) {
        return $this->execute("INSERT INTO Users(id_user, user_name, user_active, user_email, user_phone, user_code, user_password) VALUES ((Select id_user from Users order by id_user DESC LIMIT 1)+1, '$name', 1, '$email', '$phone', '$userCode', '$password')");
    }*/
}