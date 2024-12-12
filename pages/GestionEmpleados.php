<?php require_once 'Utils/layout.php'; ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Maestro de Empleados</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>Puesto</th>
                                            <th>Salario</th>
                                            <th>Fecha Contratación</th>
                                            <th>Vacaciones Disponibles</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Pérez</td>
                                            <td>12345678</td>
                                            <td>Gerente</td>
                                            <td>$1500</td>
                                            <td>01/01/2020</td>
                                            <td>10</td>
                                            <td><span class="badge bg-success">Activo</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i> Borrar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>María Gómez</td>
                                            <td>87654321</td>
                                            <td>Secretaria</td>
                                            <td>$1200</td>
                                            <td>15/03/2021</td>
                                            <td>3</td>
                                            <td><span class="badge bg-warning">Inactivo</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i> Borrar
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br/>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarEmpleado">
                                    Agregar Empleado
                                </button>
                            </div>
                        </div><!-- /.card -->
                        <br/>

                        <div class="modal fade" id="modalAgregarEmpleado" tabindex="-1" aria-labelledby="modalEmpleadoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEmpleadoLabel">Agregar Nuevo Empleado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarEmpleado">
                                            <div class="mb-3">
                                                <label for="empleado-nombre" class="form-label">Nombre del Empleado</label>
                                                <input type="text" class="form-control" id="empleado-nombre" placeholder="Ej: Juan Pérez" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="empleado-cedula" class="form-label">Cédula</label>
                                                <input type="text" class="form-control" id="empleado-cedula" placeholder="Ej: 12345678" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="empleado-puesto" class="form-label">Puesto</label>
                                                <select class="form-select" id="empleado-puesto" required>
                                                    <option selected disabled>Seleccionar Puesto</option>
                                                    <option value="Gerente">Gerente</option>
                                                    <option value="Secretaria">Secretaria</option>
                                                    <!-- Otros puestos -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="empleado-salario" class="form-label">Salario</label>
                                                <input type="number" class="form-control" id="empleado-salario" placeholder="Ej: 1500" min="0" step="0.01" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="empleado-fecha" class="form-label">Fecha de Contratación</label>
                                                <input type="date" class="form-control" id="empleado-fecha" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="empleado-estado" class="form-label">Estado</label>
                                                <select class="form-select" id="empleado-estado" required>
                                                    <option value="1" selected>Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formAgregarEmpleado">Guardar Empleado</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.col-md-6 -->
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </div> <!--end::App Main-->
</main>


        <?php require_once 'UI/footer.php'; ?>