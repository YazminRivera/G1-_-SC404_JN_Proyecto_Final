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
                                    <h3 class="card-title">Reservas de Mesas</h3>
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-hover text-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Mesa</th>
                                                <th>Fecha Reserva</th>
                                                <th>Hora</th>
                                                <th>Reservado Por</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Ejemplo de fila -->
                                            <tr>
                                                <td>Mesa 1</td>
                                                <td>2024-12-12</td>
                                                <td>19:00</td>
                                                <td>Juan Pérez</td>
                                                <td>Cumpleaños</td>
                                                <td><span class="badge bg-success">Confirmada</span></td>
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

                                    <br />
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirReserva">Nueva Reserva</button>
                                </div>
                            </div>

                            <!-- Modal para agregar nueva reserva -->
                            <div class="modal fade" id="modalAnadirReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalReservaLabel">Nueva Reserva</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formAnadirReserva">
                                                <!-- Mesa -->
                                                <div class="mb-3">
                                                    <label for="reserva-mesa" class="form-label">Mesa</label>
                                                    <select class="form-select" id="reserva-mesa" required>
                                                        <option selected disabled>Seleccionar Mesa</option>
                                                        <option value="1">Mesa 1</option>
                                                        <option value="2">Mesa 2</option>
                                                        <option value="3">Mesa 3</option>
                                                    </select>
                                                </div>
                                                <!-- Fecha de reserva -->
                                                <div class="mb-3">
                                                    <label for="reserva-fecha" class="form-label">Fecha de Reserva</label>
                                                    <input type="date" class="form-control" id="reserva-fecha" required />
                                                </div>
                                                <!-- Hora de reserva -->
                                                <div class="mb-3">
                                                    <label for="reserva-hora" class="form-label">Hora de Reserva</label>
                                                    <input type="time" class="form-control" id="reserva-hora" required />
                                                </div>
                                                <!-- Cliente -->
                                                <div class="mb-3">
                                                    <label for="reserva-cliente" class="form-label">Reservado Por</label>
                                                    <input type="text" class="form-control" id="reserva-cliente" placeholder="Nombre del Cliente" required />
                                                </div>
                                                <!-- Descripción -->
                                                <div class="mb-3">
                                                    <label for="reserva-descripcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="reserva-descripcion" rows="3" placeholder="Motivo o detalles de la reserva"></textarea>
                                                </div>
                                                <!-- Estado -->
                                                <div class="mb-3">
                                                    <label for="reserva-estado" class="form-label">Estado</label>
                                                    <select class="form-select" id="reserva-estado" required>
                                                        <option value="Confirmada" selected>Confirmada</option>
                                                        <option value="Pendiente">Pendiente</option>
                                                        <option value="Cancelada">Cancelada</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" form="formAnadirReserva">Guardar Reserva</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br/>
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Mesas</h3>     
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-hover text-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Numero de Mesa</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>                                             
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
                                                <td>02</td>
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
                                            <tr>
                                                <td>03</td>
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
                                                <td>04</td>
                                                <td><span class="badge bg-danger">Inactivo</span></td>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirPlatillo" data-bs-whatever="@mdo">Nueva Mesa</button>
                                </div>

                            </div><!-- /.card -->
                            <br/>

                            <div class="modal fade" id="modalAnadirPlatillo" tabindex="-1" aria-labelledby="modalPlatilloLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPlatilloLabel">Agregar Nuevo Platillo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formAnadirPlatillo">
                                                <!-- Nombre del platillo -->
                                                <div class="mb-3">
                                                    <label for="platillo-nombre" class="form-label">Nombre del Platillo</label>
                                                    <input type="text" class="form-control" id="platillo-nombre" placeholder="Ej: Tacos al Pastor" required>
                                                </div>
                                                <!-- Categoría -->
                                                <div class="mb-3">
                                                    <label for="platillo-categoria" class="form-label">Categoría</label>
                                                    <select class="form-select" id="platillo-categoria" required>
                                                        <option selected disabled>Seleccionar Categoría</option>
                                                        <option value="Entradas">Entradas</option>
                                                        <option value="Plato Fuerte">Plato Fuerte</option>
                                                        <option value="Postres">Postres</option>
                                                        <option value="Bebidas">Bebidas</option>
                                                    </select>
                                                </div>
                                                <!-- Precio -->
                                                <div class="mb-3">
                                                    <label for="platillo-precio" class="form-label">Precio Unitario Bruto (sin impuestos)</label>
                                                    <input type="number" class="form-control" id="platillo-precio" placeholder="Ej: 100.00" min="0" step="0.01" required>
                                                </div>
                                                <!-- Estado -->
                                                <div class="mb-3">
                                                    <label for="platillo-estado" class="form-label">Estado</label>
                                                    <select class="form-select" id="platillo-estado" required>
                                                        <option value="1" selected>Activo</option>
                                                        <option value="0">Inactivo</option>
                                                    </select>
                                                </div>
                                                <!-- Ingredientes -->
                                                <div class="mb-3">
                                                    <label class="form-label">Ingredientes</label>
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-md-6">
                                                            <select class="form-select" id="ingrediente-select">
                                                                <option selected disabled>Seleccionar Ingrediente</option>
                                                                <option value="Pollo">Pollo</option>
                                                                <option value="Carne">Carne</option>
                                                                <option value="Queso">Queso</option>
                                                                <!-- Agregar dinámicamente los productos desde el inventario -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" class="form-control" id="ingrediente-cantidad" placeholder="Cantidad" min="1">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-success" id="agregar-ingrediente">Agregar</button>
                                                        </div>
                                                    </div>
                                                    <ul class="list-group mt-3" id="lista-ingredientes">
                                                        <!-- Ingredientes agregados dinámicamente -->
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" form="formAnadirPlatillo">Guardar Platillo</button>
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