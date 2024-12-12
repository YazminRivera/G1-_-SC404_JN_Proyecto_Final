<?php
require_once "./../config/Conexion.php";

class GestionUsuarioModel
{
    protected static $cnx;
    private $USUARIOS_ID_USUARIO_PK = null;
    private $CEDULA = null;
    private $ESTADOS_ID_ESTADO_FK = null;
    private $PAISES_ID_PAIS_FK = null;
    private $PROVINCIAS_ID_PROVINCIA_FK = null;
    private $CALLES_ID_CALLE_FK = null;
    private $ROLES_ID_ROL_FK = null;
    private $SEGUNDO_NOMBRE = null;
    private $PRIMER_APELLIDO = null;
    private $SEGUNDO_APELLIDO = null;
    private $FECHA_NACIMIENTO = null;
    private $TELEFONO = null;
    private $USUARIO = null;
    private $CONTRASENA = null;
    public static function getConexion()
    {
        if (self::$cnx === null) {
            self::$cnx = Conexion::conectar(); // Ahora obtenemos la conexión correctamente.
        }
        return self::$cnx; // Retornamos la conexión.
    }
    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function setUSUARIOS_ID_USUARIO_PK($USUARIOS_ID_USUARIO_PK)
    {
        $this->USUARIOS_ID_USUARIO_PK = $USUARIOS_ID_USUARIO_PK;
    }
    public function getCEDULA()
    {
        return $this->CEDULA;
    }
    public function setCEDULA($CEDULA)
    {
        $this->CEDULA = $CEDULA;
    }
    public function getUSUARIOS_ID_USUARIO_PK()
    {
        return $this->USUARIOS_ID_USUARIO_PK;
    }
    public function setESTADOS_ID_ESTADO_FK($ESTADOS_ID_ESTADO_FK)
    {
        $this->ESTADOS_ID_ESTADO_FK = $ESTADOS_ID_ESTADO_FK;
    }
    public function getESTADOS_ID_ESTADO_FK()
    {
        return $this->ESTADOS_ID_ESTADO_FK;
    }

    public function setPAISES_ID_PAIS_FK($PAISES_ID_PAIS_FK)
    {
        $this->PAISES_ID_PAIS_FK = $PAISES_ID_PAIS_FK;
    }
    public function getPAISES_ID_PAIS_FK()
    {
        return $this->PAISES_ID_PAIS_FK;
    }
    public function setPROVINCIAS_ID_PROVINCIA_FK($PROVINCIAS_ID_PROVINCIA_FK)
    {
        $this->PROVINCIAS_ID_PROVINCIA_FK = $PROVINCIAS_ID_PROVINCIA_FK;
    }
    public function getPROVINCIAS_ID_PROVINCIA_FK()
    {
        return $this->PROVINCIAS_ID_PROVINCIA_FK;
    }
    public function setCALLES_ID_CALLE_FK($CALLES_ID_CALLE_FK)
    {
        $this->CALLES_ID_CALLE_FK = $CALLES_ID_CALLE_FK;
    }
    public function getCALLES_ID_CALLE_FK()
    {
        return $this->CALLES_ID_CALLE_FK;
    }
    



    public static function traerUsuario()
    {
        $query = "SELECT * FROM FIDE_USUARIOS_TB";
        $result = [];

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al obtener los estados: " . $ex->getMessage();
        }

        return $result;
    }

    public static function eliminar(INT $id)
    {
        $query = "DELETE * FROM FIDE_ESTADOS_T WHERE estados_id_estado_pk = :id";
        $result = false;
        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $result = true; 
            }
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar(); 
            echo "Error al eliminar el estado: " . $ex->getMessage(); 
        }
        return $result;
    }

    public function insertarEstado(){
        $QUERY = "CALL FIDE_CLINICA_SILLY_PS_PKG.FIDE_ESTADOS_TB_INSERTAR_ESTADO_SP(:nombreEstado, :detalleEstado)";

        try{
            self::getConexion();
            $nombreEstado = $this->getNombreEstado();
            $detalleEstado = $this->getDetalleEstado();
            $stmt = self::$conn->prepare($QUERY);
            $stmt->bindParam(':nombreEstado', $nombreEstado, PDO::PARAM_STR);
            $stmt->bindParam(':detalleEstado', $detalleEstado, PDO::PARAM_STR);
            $stmt->execute();
            self::desconectar();

            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
}
