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
                                    <h3 class="card-title">Usuarios del Negocio</h3>     
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-primary">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                    </tbody>
                                    </table>
                                    <br/>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirUsuario" data-bs-whatever="@mdo">Open modal for @mdo</button>
                                </div>

                            </div><!-- /.card -->
                            <br/>

                            <div class="modal fade" id="modalAnadirUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">User:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Correo:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Permisos:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div> -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Send message</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Usuarios del Negocio</h3>     
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-hover text-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-primary">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                        <tr>
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
                                        </tr>
                                    </tbody>
                                    </table>
                                    <br/>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadirClientes" data-bs-whatever="@mdo">Open modal for @mdo</button>
                                </div>

                            </div><!-- /.card -->


                            <div class="modal fade" id="modalAnadirClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">User:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Correo:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Permisos:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Send message</button>
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