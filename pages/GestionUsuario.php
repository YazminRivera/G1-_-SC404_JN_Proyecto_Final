<?php require_once 'Utils/layout.php'; ?>

<?php
require_once "./../models/GestionUsuarioModel.php";
$gestionesUsuarios = GestionUsuarioModel::traerUsuario();
$paises = GestionUsuarioModel::traerPais();
$provincia = GestionUsuarioModel::traerProvincia();
$calles = GestionUsuarioModel::traerCalles();
$roles = GestionUsuarioModel::traerRoles();
$tiposUsuarios = GestionUsuarioModel::traerTipoUsuarios();
?>
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--    <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard v3</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard v3
                                </li>
                            </ol>
                        </div>
                    </div> 
                </div> -->
    </div>
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid mt-4"> <!--begin::Row-->
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Usuarios del Negocio</h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-hover text-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Pais</th>
                                        <th>Provincia</th>
                                        <th>Calle</th>
                                        <th>Rol</th>
                                        <th>Telefono</th>
                                        <th>Correo electronico</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gestionesUsuarios as $gestionUsuario): ?>
                                        <tr>
                                            <td><?php echo $gestionUsuario['usuario']; ?></td>
                                            <td><?php echo $gestionUsuario['primer_nombre'] . " " . $gestionUsuario['segundo_nombre'] . " " . $gestionUsuario['primer_apellido'] . " " . $gestionUsuario['segundo_apellido'] ?></td>
                                            <td><?php echo $gestionUsuario['cedula']; ?></td>
                                            <td><?php echo $gestionUsuario['nombre_pais']; ?></td>
                                            <td><?php echo $gestionUsuario['nombre_provincia']; ?></td>
                                            <td><?php echo $gestionUsuario['nombre_calle']; ?></td>
                                            <td><?php echo $gestionUsuario['nombre_rol']; ?></td>
                                            <td><?php echo $gestionUsuario['telefono']; ?></td>
                                            <td><?php echo $gestionUsuario['correo_electronico']; ?></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Borrar
                                                </a>
                                            </td>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br />
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirUsuario" data-bs-whatever="@mdo">Agregar usuario</button>
                        </div>

                    </div><!-- /.card -->
                    <br />

                    <div class="modal fade" id="modalAnadirUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Usuario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formUsuario">
                                        <div class="mb-3">
                                            <label for="usuario" class="col-form-label">Usuario:</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario">
                                        </div>
                                        <div class="mb-3">
                                            <label for="primer-nombre" class="col-form-label">Primer Nombre:</label>
                                            <input type="text" class="form-control" id="primer-nombre" name="primer_nombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="segundo-nombre" class="col-form-label">Segundo Nombre:</label>
                                            <input type="text" class="form-control" id="segundo-nombre" name="segundo_nombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="segundo-apellido" class="col-form-label">Segundo Apellido:</label>
                                            <input type="text" class="form-control" id="segundo-apellido" name="segundo_apellido">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fecha-nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                                            <input type="date" class="form-control" id="fecha-nacimiento" name="fecha_nacimiento">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="col-form-label">Teléfono:</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono">
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo-electronico" class="col-form-label">Correo Electrónico:</label>
                                            <input type="email" class="form-control" id="correo-electronico" name="correo_electronico">
                                        </div>

                                        <div class="mb-3">
                                            <label for="pais-select" class="col-form-label">País:</label>
                                            <select class="form-control" id="pais-select" name="paises_id_pais_fk">
                                                <option value="">Seleccione un país</option>
                                                <?php foreach ($paises as $pais): ?>
                                                    <option value="<?php echo $pais['paises_id_pais_pk']; ?>"><?php echo $pais['nombre_pais']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="provincia-select" class="col-form-label">Provincia:</label>
                                            <select class="form-control" id="provincia-select" name="provincias_id_provincia_fk">
                                                <option value="">Seleccione una provincia</option>
                                                <?php foreach ($provincias as $provincia): ?>
                                                    <option value="<?php echo $provincia['provincias_id_provincia_pk']; ?>"><?php echo $provincia['nombre_provincia']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="calle-select" class="col-form-label">Calle:</label>
                                            <select class="form-control" id="calle-select" name="calles_id_calle_fk">
                                                <option value="">Seleccione una calle</option>
                                                <?php foreach ($calles as $calle): ?>
                                                    <option value="<?php echo $calle['calles_id_calle_pk']; ?>"><?php echo $calle['nombre_calle']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class='mb-3'>
                                            <label for='rol-select' class='col-form-label'>Rol:</label>
                                            <select class='form-control' id='rol-select' name='roles_id_rol_fk'>
                                                <option value="">Seleccione un rol</option>
                                                <?php foreach ($roles as $rol): ?>
                                                    <option value="<?php echo $rol['roles_id_rol_pk']; ?>"><?php echo $rol['nombre_rol']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='tipo-usuario-select' class='col-form-label'>Tipo de Usuario:</label>
                                            <select class='form-control' id='tipo-usuario-select' name='tipos_usuarios_id_tipo_usuario_fk'>
                                                <option value="">Seleccione un tipo de usuario</option>
                                                <?php foreach ($tiposUsuarios as $tipoUsuario): ?>
                                                    <option value="<?php echo $tipoUsuario['tipos_usuarios_id_tipo_usuario_pk']; ?>"><?php echo $tipoUsuario['nombre_tipo_usuario']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='contrasena' class='col-form-label'>Contraseña:</label>
                                            <input type='password' class='form-control' id='contrasena' name='contrasena'>
                                        </div>
                                        <center> <button type='submit' class='btn btn-primary'>Enviar</button></center>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col-md-6 -->

            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->

<?php require_once 'UI/footer.php'; ?>