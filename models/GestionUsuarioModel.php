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
    private $PRIMER_NOMBRE = null;
    private $SEGUNDO_NOMBRE = null;
    private $PRIMER_APELLIDO = null;
    private $SEGUNDO_APELLIDO = null;
    private $FECHA_NACIMIENTO = null;
    private $TELEFONO = null;
    private $USUARIO = null;
    private $CONTRASENA = null;
    private $CORREO_ELECTRONICO = null;
    private $TIPOS_USUARIOS_ID_TIPO_USUARIO_FK = null;
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
    public function setROLES_ID_ROL_FK($ROLES_ID_ROL_FK)
    {
        $this->ROLES_ID_ROL_FK = $ROLES_ID_ROL_FK;
    }
    public function getROLES_ID_ROL_FK()
    {
        return $this->ROLES_ID_ROL_FK;
    }
    public function setPRIMER_NOMBRE($PRIMER_NOMBRE)
    {
        $this->PRIMER_NOMBRE = $PRIMER_NOMBRE;
    }
    public function getPRIMER_NOMBRE()
    {
        return $this->PRIMER_NOMBRE;
    }
    public function setSEGUNDO_NOMBRE($SEGUNDO_NOMBRE)
    {
        $this->SEGUNDO_NOMBRE = $SEGUNDO_NOMBRE;
    }
    public function getSEGUNDO_NOMBRE()
    {
        return $this->SEGUNDO_NOMBRE;
    }
    public function setPRIMER_APELLIDO($PRIMER_APELLIDO)
    {
        $this->PRIMER_APELLIDO = $PRIMER_APELLIDO;
    }
    public function getPRIMER_APELLIDO()
    {
        return $this->PRIMER_APELLIDO;
    }
    public function setSEGUNDO_APELLIDO($SEGUNDO_APELLIDO)
    {
        $this->SEGUNDO_APELLIDO = $SEGUNDO_APELLIDO;
    }
    public function getSEGUNDO_APELLIDO()
    {
        return $this->SEGUNDO_APELLIDO;
    }
    public function setFECHA_NACIMIENTO($FECHA_NACIMIENTO)
    {
        $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;
    }
    public function getFECHA_NACIMIENTO()
    {
        return $this->FECHA_NACIMIENTO;
    }
    public function setTELEFONO($TELEFONO)
    {
        $this->TELEFONO = $TELEFONO;
    }
    public function getTELEFONO()
    {
        return $this->TELEFONO;
    }
    public function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;
    }
    public function getUSUARIO()
    {
        return $this->USUARIO;
    }
    public function setCONTRASENA($CONTRASENA)
    {
        $this->CONTRASENA = $CONTRASENA;
    }
    public function getCONTRASENA()
    {
        return $this->CONTRASENA;
    }
    public function setCORREO_ELECTRONICO($CORREO_ELECTRONICO)
    {
        $this->CORREO_ELECTRONICO = $CORREO_ELECTRONICO;
    }
    public function getCORREO_ELECTRONICO()
    {
        return $this->CORREO_ELECTRONICO;
    }
    public function setTIPOS_USUARIOS_ID_TIPO_USUARIO_FK($TIPOS_USUARIOS_ID_TIPO_USUARIO_FK)
    {
        $this->TIPOS_USUARIOS_ID_TIPO_USUARIO_FK = $TIPOS_USUARIOS_ID_TIPO_USUARIO_FK;
    }
    public function getTIPOS_USUARIOS_ID_TIPO_USUARIO_FK()
    {
        return $this->TIPOS_USUARIOS_ID_TIPO_USUARIO_FK;
    }


    public static function traerUsuario()
    {
        $query = "SELECT * FROM FIDE_USUARIO_VM";
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
    public static function traerPais()
    {
        $query = "SELECT * FROM FIDE_PAIS_V";
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
    public static function traerProvincia()
    {
        $query = "SELECT * FROM FIDE_PROVINCIA_V";
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
    public static function traerCalles()
    {
        $query = "SELECT * FROM FIDE_CALLES_V";
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
    public static function traerRoles()
    {
        $query = "SELECT * FROM FIDE_ROLES_V";
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
    public static function traerTipoUsuarios()
    {
        $query = "SELECT * FROM FIDE_TIPO_USUARIOS_V";
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
        $query = "CALL FIDE_CLINICA_SILLY_PS_PKG.FIDE_ESTADOS_TB_INSERTAR_ESTADO_SP()";
        $result = false;
        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

    
    public function insertarUsuario() {
        // Definir la consulta para llamar al procedimiento almacenado
        $QUERY = "CALL FIDE_CLINICA_SILLY_PS_PKG.PROCEDURE FIDE_USUARIOS_TB_INSERTAR_USUARIO_SP(
            :P_ID_PAIS_FK,
            :P_ID_PROVINCIAS_FK,
            :P_ID_CALLES_FK,
            :P_ID_ROL_FK,
            :P_ID_TIPO_USUARIO_FK,
            :P_CEDULA,
            :P_PRIMER_NOMBRE,
            :P_SEGUNDO_NOMBRE,
            :P_PRIMER_APELLIDO,
            :P_SEGUNDO_APELLIDO,
            :P_FECHA_NACIMIENTO,
            :P_TELEFONO,
            :P_CORREO_ELECTRONICO,
            :P_USUARIO,
            :P_CONTRASENA,
            :P_ESTADOS_ID_ESTADO_FK
        )";
    
        try {
            self::getConexion();
    
            $stmt = self::$cnx->prepare($QUERY);
    
            $paisId = $this->getPAISES_ID_PAIS_FK();
            $provinciaId = $this->getPROVINCIAS_ID_PROVINCIA_FK();
            $calleId = $this->getCALLES_ID_CALLE_FK();
            $rolId = $this->getROLES_ID_ROL_FK();
            $tipoUsuarioId = $this->getTIPOS_USUARIOS_ID_TIPO_USUARIO_FK();
            $cedula = $this->getCEDULA();
            $primerNombre = $this->getPRIMER_NOMBRE();
            $segundoNombre = $this->getSEGUNDO_NOMBRE();
            $primerApellido = $this->getPRIMER_APELLIDO();
            $segundoApellido = $this->getSEGUNDO_APELLIDO();
            $fechaNacimiento =  $this->getFECHA_NACIMIENTO();
            $telefono = $this->getTELEFONO();
            $correoElectronico = $this->getCORREO_ELECTRONICO();
            $usuario = $this->getUSUARIO();
            $contrasena = $this->getCONTRASENA();
            $estadoId = 1; 
            $stmt->bindParam(':P_ID_PAIS_FK', $paisId, PDO::PARAM_INT);
            $stmt->bindParam(':P_ID_PROVINCIAS_FK', $provinciaId, PDO::PARAM_INT);
            $stmt->bindParam(':P_ID_CALLES_FK', $calleId, PDO::PARAM_INT);
            $stmt->bindParam(':P_ID_ROL_FK', $rolId, PDO::PARAM_INT);
            $stmt->bindParam(':P_ID_TIPO_USUARIO_FK', $tipoUsuarioId, PDO::PARAM_INT);
            $stmt->bindParam(':P_CEDULA', $cedula, PDO::PARAM_STR);
            $stmt->bindParam(':P_PRIMER_NOMBRE', $primerNombre, PDO::PARAM_STR);
            $stmt->bindParam(':P_SEGUNDO_NOMBRE', $segundoNombre, PDO::PARAM_STR);
            $stmt->bindParam(':P_PRIMER_APELLIDO', $primerApellido, PDO::PARAM_STR);
            $stmt->bindParam(':P_SEGUNDO_APELLIDO', $segundoApellido, PDO::PARAM_STR);
            $stmt->bindParam(':P_FECHA_NACIMIENTO', $fechaNacimiento, PDO::PARAM_STR);
            $stmt->bindParam(':P_TELEFONO', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':P_CORREO_ELECTRONICO', $correoElectronico, PDO::PARAM_STR);
            $stmt->bindParam(':P_USUARIO', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':P_CONTRASENA',  $contrasena, PDO::PARAM_STR);
            $stmt->bindParam(':P_ESTADOS_ID_ESTADO_FK', $estadoId, PDO::PARAM_INT);  
            $stmt->execute();
            self::desconectar();
            return true;  
         }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}
