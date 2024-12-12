<?php
require_once "global.php";

class Conexion
{
    private static $conn;

    public static function conectar()
    {
        $tns = "(DESCRIPTION=
            (ADDRESS=
                (PROTOCOL=TCP)(HOST=" . HOST . ")
                (PORT=" . PORT . "))
            (CONNECT_DATA=
                (SERVER=DEDICATED)
                (SERVICE_NAME=" . NAME . "))
        )";

        $configPDO = [
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            self::$conn = new PDO('oci:dbname='.$tns, USER, PASS, $configPDO);
            return self::$conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null; 
        }
    }
}

?>