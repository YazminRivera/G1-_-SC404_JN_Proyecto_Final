<?php require_once 'Utils/layout.php'; ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Gestión de Pagos de Planillas</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Empleado</th>
                                            <th>Fecha de Pago</th>
                                            <th>Cantidad Pagada</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Pérez</td>
                                            <td>2024-12-01</td>
                                            <td>$1200</td>
                                            <td><span class="badge bg-success">Pagado</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarPago">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i> Borrar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>María Gómez</td>
                                            <td>2024-12-01</td>
                                            <td>$1000</td>
                                            <td><span class="badge bg-warning">Pendiente</span></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarPago">
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarPago">
                                    Agregar Pago
                                </button>
                            </div>
                        </div><!-- /.card -->
                        <br/>

                        <!-- Modal para agregar Pago -->
                        <div class="modal fade" id="modalAgregarPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPagoLabel">Agregar Nuevo Pago</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarPago">
                                            <div class="mb-3">
                                                <label for="pago-empleado" class="form-label">Empleado</label>
                                                <select class="form-select" id="pago-empleado" required>
                                                    <option selected disabled>Seleccionar Empleado</option>
                                                    <option value="123">Juan Pérez</option>
                                                    <option value="124">María Gómez</option>
                                                    <!-- Agregar más empleados -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pago-cantidad" class="form-label">Cantidad Pagada</label>
                                                <input type="number" class="form-control" id="pago-cantidad" placeholder="Ej: 1200" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pago-fecha" class="form-label">Fecha de Pago</label>
                                                <input type="date" class="form-control" id="pago-fecha" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pago-estado" class="form-label">Estado</label>
                                                <select class="form-select" id="pago-estado" required>
                                                    <option value="1" selected>Pagado</option>
                                                    <option value="0">Pendiente</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formAgregarPago">Guardar Pago</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para editar Pago -->
                        <div class="modal fade" id="modalEditarPago" tabindex="-1" aria-labelledby="modalEditarPagoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarPagoLabel">Editar Pago</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditarPago">
                                            <!-- Similar a los campos para agregar pago, pero con valores prellenados -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" form="formEditarPago">Actualizar Pago</button>
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