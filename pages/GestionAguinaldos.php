<?php require_once 'Utils/layout.php'; ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Gestión de Aguinaldos</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Empleado</th>
                                            <th>Cantidad Aguinaldo</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Pérez</td>
                                            <td>$500</td>
                                            <td>2024-12-15</td>
                                            <td><span class="badge bg-success">Pagado</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarAguinaldo">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i> Borrar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>María Gómez</td>
                                            <td>$450</td>
                                            <td>2024-12-16</td>
                                            <td><span class="badge bg-warning">Pendiente</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarAguinaldo">
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarAguinaldo">
                                    Agregar Aguinaldo
                                </button>
                            </div>
                        </div><!-- /.card -->
                        <br/>

                        <!-- Modal para agregar Aguinaldo -->
                        <div class="modal fade" id="modalAgregarAguinaldo" tabindex="-1" aria-labelledby="modalAguinaldoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAguinaldoLabel">Agregar Nuevo Aguinaldo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarAguinaldo">
                                            <div class="mb-3">
                                                <label for="aguinaldo-empleado" class="form-label">Empleado</label>
                                                <select class="form-select" id="aguinaldo-empleado" required>
                                                    <option selected disabled>Seleccionar Empleado</option>
                                                    <option value="123">Juan Pérez</option>
                                                    <option value="124">María Gómez</option>
                                                    <!-- Agregar más empleados -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="aguinaldo-cantidad" class="form-label">Cantidad de Aguinaldo</label>
                                                <input type="number" class="form-control" id="aguinaldo-cantidad" placeholder="Ej: 500" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="aguinaldo-fecha" class="form-label">Fecha</label>
                                                <input type="date" class="form-control" id="aguinaldo-fecha" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="aguinaldo-estado" class="form-label">Estado</label>
                                                <select class="form-select" id="aguinaldo-estado" required>
                                                    <option value="1" selected>Pagado</option>
                                                    <option value="0">Pendiente</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formAgregarAguinaldo">Guardar Aguinaldo</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para editar Aguinaldo -->
                        <div class="modal fade" id="modalEditarAguinaldo" tabindex="-1" aria-labelledby="modalEditarAguinaldoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarAguinaldoLabel">Editar Aguinaldo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditarAguinaldo">
                                            <!-- Similar a los campos para agregar aguinaldo, pero con valores prellenados -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formEditarAguinaldo">Actualizar Aguinaldo</button>
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