<?php require_once 'Utils/layout.php'; ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Gestión de Vacaciones</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Empleado</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Motivo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Pérez</td>
                                            <td>2024-01-10</td>
                                            <td>2024-01-20</td>
                                            <td>Vacaciones Anuales</td>
                                            <td><span class="badge bg-success">Aprobada</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarVacacion">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i> Borrar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>María Gómez</td>
                                            <td>2024-02-01</td>
                                            <td>2024-02-10</td>
                                            <td>Descanso Médico</td>
                                            <td><span class="badge bg-warning">Pendiente</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarVacacion">
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarVacacion">
                                    Agregar Vacación
                                </button>
                            </div>
                        </div><!-- /.card -->
                        <br/>

                        <!-- Modal para agregar Vacación -->
                        <div class="modal fade" id="modalAgregarVacacion" tabindex="-1" aria-labelledby="modalVacacionLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalVacacionLabel">Agregar Nueva Vacación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarVacacion">
                                            <div class="mb-3">
                                                <label for="vacacion-empleado" class="form-label">Empleado</label>
                                                <select class="form-select" id="vacacion-empleado" required>
                                                    <option selected disabled>Seleccionar Empleado</option>
                                                    <option value="123">Juan Pérez</option>
                                                    <option value="124">María Gómez</option>
                                                    <!-- Agregar más empleados -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vacacion-fechaInicio" class="form-label">Fecha de Inicio</label>
                                                <input type="date" class="form-control" id="vacacion-fechaInicio" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vacacion-fechaFin" class="form-label">Fecha de Fin</label>
                                                <input type="date" class="form-control" id="vacacion-fechaFin" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vacacion-motivo" class="form-label">Motivo</label>
                                                <input type="text" class="form-control" id="vacacion-motivo" placeholder="Ej: Vacaciones Anuales" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vacacion-estado" class="form-label">Estado</label>
                                                <select class="form-select" id="vacacion-estado" required>
                                                    <option value="1" selected>Aprobada</option>
                                                    <option value="0">Pendiente</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formAgregarVacacion">Guardar Vacación</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para editar Vacación -->
                        <div class="modal fade" id="modalEditarVacacion" tabindex="-1" aria-labelledby="modalEditarVacacionLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarVacacionLabel">Editar Vacación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditarVacacion">
                                            <!-- Similar a los campos para agregar vacación, pero con valores prellenados -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formEditarVacacion">Actualizar Vacación</button>
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