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
                                    <h3 class="card-title">Menu</h3>     
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-hover text-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nombre del Platillo</th>
                                                <th>Categoría</th>
                                                <th>Precio con Impuestos</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Hamburguesa Clásica</td>
                                                <td>Comida Rápida</td>
                                                <td>$8.99</td>
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
                                                <td>Pizza Margarita</td>
                                                <td>Italiana</td>
                                                <td>$12.50</td>
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
                                                <td>Sopa de Tortilla</td>
                                                <td>Sopas</td>
                                                <td>$6.75</td>
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
                                                <td>Ensalada César</td>
                                                <td>Ensaladas</td>
                                                <td>$7.99</td>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirPlatillo" data-bs-whatever="@mdo">Open modal for @mdo</button>
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