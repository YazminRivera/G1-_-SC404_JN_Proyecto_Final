<?php
require_once "../models/GestionUsuarioModel.php"; // Asegúrate de que este modelo existe y tiene los métodos necesarios

switch ($_GET["op"]) {
    case 'insertar':
        // Obtener datos del formulario
        $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
        $primer_nombre = isset($_POST["primer_nombre"]) ? trim($_POST["primer_nombre"]) : "";
        $segundo_nombre = isset($_POST["segundo_nombre"]) ? trim($_POST["segundo_nombre"]) : "";
        $segundo_apellido = isset($_POST["segundo_apellido"]) ? trim($_POST["segundo_apellido"]) : "";
        $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? trim($_POST["fecha_nacimiento"]) : "";
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
        $correo_electronico = isset($_POST["correo_electronico"]) ? trim($_POST["correo_electronico"]) : "";
        $paises_id_pais_fk = isset($_POST["paises_id_pais_fk"]) ? trim($_POST["paises_id_pais_fk"]) : "";
        $provincias_id_provincia_fk = isset($_POST["provincias_id_provincia_fk"]) ? trim($_POST["provincias_id_provincia_fk"]) : "";
        $calles_id_calle_fk = isset($_POST["calles_id_calle_fk"]) ? trim($_POST["calles_id_calle_fk"]) : "";
        $roles_id_rol_fk = isset($_POST["roles_id_rol_fk"]) ? trim($_POST["roles_id_rol_fk"]) : "";
        $tipos_usuarios_id_tipo_usuario_fk = isset($_POST["tipos_usuarios_id_tipo_usuario_fk"]) ? trim($_POST["tipos_usuarios_id_tipo_usuario_fk"]) : "";
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";

        // Crear una instancia del modelo
        $usuarioModel = new GestionUsuarioModel();

        // Asignar los valores a las propiedades del modelo
        $usuarioModel->setUSUARIO($usuario);
        $usuarioModel->setPRIMER_NOMBRE($primer_nombre);
        $usuarioModel->setSEGUNDO_NOMBRE($segundo_nombre);
        $usuarioModel->setSEGUNDO_APELLIDO($segundo_apellido);
        $usuarioModel->setFECHA_NACIMIENTO($fecha_nacimiento);
        $usuarioModel->setTELEFONO($telefono);
        $usuarioModel->setCORREO_ELECTRONICO($correo_electronico);
        $usuarioModel->setPAISES_ID_PAIS_FK($paises_id_pais_fk);
        $usuarioModel->setPROVINCIAS_ID_PROVINCIA_FK($provincias_id_provincia_fk);
        $usuarioModel->setCALLES_ID_CALLE_FK($calles_id_calle_fk);
        $usuarioModel->setROLES_ID_ROL_FK($roles_id_rol_fk);
        $usuarioModel->setTIPOS_USUARIOS_ID_TIPO_USUARIO_FK($tipos_usuarios_id_tipo_usuario_fk);
        
        
        try {
            // Llamar al método para insertar el usuario
            $usuarioModel->insertarUsuario(); // Este método debe estar definido en tu modelo
            echo "Se inserto el usuario";
        } catch (PDOException $th) {
            echo 2;  // Error en la inserción
            error_log($th->getMessage());  // Registrar el error
        }
    break;
}
?>