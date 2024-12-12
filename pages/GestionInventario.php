<?php require_once 'Utils/layout.php'; ?>

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
                                    <h3 class="card-title">Inventario</h3>     
                                </div>
                                <div class="card-body table-responsive p-3">
                                <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Unidad</th>
                                            <th>Peso</th>
                                            <th>Cantidad</th>
                                            <th>Stock</th>
                                            <th>Estado</th>
                                            <th>Proveedor</th>
                                            <th>Ingreso</th>
                                            <th>Vencimiento</th>
                                            <th>Coste Unitario</th>
                                            <th>Coste Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Carne</td>
                                            <td>Alimentos</td>
                                            <td>Kg</td>
                                            <td>5</td>
                                            <td>20</td>
                                            <td>Disponible</td>
                                            <td><span class="tag tag-success">Aprobado</span></td>
                                            <td>Proveedor 1</td>
                                            <td>11-7-2024</td>
                                            <td>11-12-2024</td>
                                            <td>$10.00</td>
                                            <td>$200.00</td>
                                        </tr>
                                        <tr>
                                            <td>Tamarindo</td>
                                            <td>Bebidas</td>
                                            <td>Lt</td>
                                            <td>2</td>
                                            <td>50</td>
                                            <td>Disponible</td>
                                            <td><span class="tag tag-warning">Pendiente</span></td>
                                            <td>Proveedor 2</td>
                                            <td>11-7-2024</td>
                                            <td>11-12-2024</td>
                                            <td>$1.50</td>
                                            <td>$75.00</td>
                                        </tr>
                                        <tr>
                                            <td>Chocolates</td>
                                            <td>Snacks</td>
                                            <td>Paquete</td>
                                            <td>-</td>
                                            <td>30</td>
                                            <td>Bajo</td>
                                            <td><span class="tag tag-primary">Aprobado</span></td>
                                            <td>Proveedor 3</td>
                                            <td>11-7-2024</td>
                                            <td>11-12-2024</td>
                                            <td>$2.00</td>
                                            <td>$60.00</td>
                                        </tr>
                                        <tr>
                                            <td>Pimienta</td>
                                            <td>Condimentos</td>
                                            <td>Gramos</td>
                                            <td>0.5</td>
                                            <td>10</td>
                                            <td>No disponible</td>
                                            <td><span class="tag tag-danger">Rechazado</span></td>
                                            <td>Proveedor 4</td>
                                            <td>11-7-2024</td>
                                            <td>11-12-2024</td>
                                            <td>$0.75</td>
                                            <td>$7.50</td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <br/>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirProducto" data-bs-whatever="@mdo">Open modal for @mdo</button>
                                </div>

                            </div><!-- /.card -->
                            <br/>

                            <div class="modal fade" id="modalAnadirProducto" tabindex="-1" aria-labelledby="modalAnadirProductoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalAnadirProductoLabel">Agregar Nuevo Producto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formAgregarProducto">
                                                <div class="mb-3">
                                                    <label for="producto" class="col-form-label">Producto:</label>
                                                    <input type="text" class="form-control" id="producto" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tipo" class="col-form-label">Tipo:</label>
                                                    <input type="text" class="form-control" id="tipo" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="unidad" class="col-form-label">Unidad:</label>
                                                    <input type="text" class="form-control" id="unidad" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="peso" class="col-form-label">Peso:</label>
                                                    <input type="number" class="form-control" id="peso" step="0.01">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cantidad" class="col-form-label">Cantidad:</label>
                                                    <input type="number" class="form-control" id="cantidad" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="col-form-label">Stock:</label>
                                                    <input type="text" class="form-control" id="stock">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="estado" class="col-form-label">Estado:</label>
                                                    <select class="form-control" id="estado">
                                                        <option value="Disponible">Disponible</option>
                                                        <option value="Bajo">Bajo</option>
                                                        <option value="No disponible">No disponible</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="proveedor" class="col-form-label">Proveedor:</label>
                                                    <input type="text" class="form-control" id="proveedor">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ingreso" class="col-form-label">Fecha de Ingreso:</label>
                                                    <input type="date" class="form-control" id="ingreso" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="vencimiento" class="col-form-label">Fecha de Vencimiento:</label>
                                                    <input type="date" class="form-control" id="vencimiento">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="coste-unitario" class="col-form-label">Coste Unitario:</label>
                                                    <input type="number" class="form-control" id="coste-unitario" step="0.01" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="coste-total" class="col-form-label">Coste Total:</label>
                                                    <input type="number" class="form-control" id="coste-total" step="0.01" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary" form="formAgregarProducto">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.col-->
                        
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

        <?php require_once 'UI/footer.php'; ?>