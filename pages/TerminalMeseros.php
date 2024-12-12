<?php require_once 'Utils/layout.php'; ?>

        <br/>
        <main class="app-main"> <!--begin::App Content Header 
            <div class="app-content-header"> 
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div> 
                </div> 
            </div> end::App Content Header--> <!--begin::App Content-->
            <br/>
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        <div  type="button" data-bs-toggle="modal" data-bs-target="#ejemplo"  class="col-lg-3 col-6"> 
                          <!--begin::Small Box Widget 1-->
                                <div id="mesa1" class="small-box text-bg-primary">
                                    <div class="inner">
                                        <h3 style="justify-self: center;">Mesa 1</h3>
                                        <p></p>
                                    </div> 
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Agregar Menú  </a>
                                </div> <!--end::Small Box Widget 1-->
                          
                        </div> <!--end::Col-->
                        <div type="button" data-bs-toggle="modal" data-bs-target="#ejemplo" class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3 style="justify-self: center;">Mesa 2</h3>
                                    <p></p>
                                </div> 
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Agregar Menú  </a>
                            </div> <!--end::Small Box Widget 1-->
                        </div> <!--end::Col-->
                        <div type="button" data-bs-toggle="modal" data-bs-target="#ejemplo" class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3 style="justify-self: center;">Mesa 3</h3>
                                    <p></p>
                                </div> 
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Agregar Menú  </a>
                            </div> <!--end::Small Box Widget 1-->
                        </div> <!--end::Col-->
                        <div type="button" data-bs-toggle="modal" data-bs-target="#ejemplo" class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3 style="justify-self: center;">Mesa 4</h3>
                                    <p></p>
                                </div> 
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Agregar Menú  </a>
                            </div> <!--end::Small Box Widget 1-->
                        </div> <!--end::Col-->
                        <div type="button" data-bs-toggle="modal" data-bs-target="#ejemplo" class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3 style="justify-self: center;">Mesa 5</h3>
                                    <p></p>
                                </div> 
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Agregar Menú  </a>
                            </div> <!--end::Small Box Widget 1-->
                        </div> <!--end::Col-->
                    </div> <!--end::Row--> <!--begin::Row-->

                    
                    <div class="modal fade" id="ejemplo" tabindex="-1" aria-labelledby="modalTomarPedidoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTomarPedidoLabel">Tomar Pedido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formTomarPedido">
                                        <!-- Selección de platillos o combos -->
                                        <div class="mb-3">
                                            <label class="form-label">Platillos o Combos</label>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <select class="form-select" id="pedido-select">
                                                        <option selected disabled>Seleccionar Platillo o Combo</option>
                                                        <option value="Hamburguesa">Hamburguesa</option>
                                                        <option value="Pizza Margarita">Pizza Margarita</option>
                                                        <option value="Combo Familiar">Combo Familiar</option>
                                                        <!-- Agregar dinámicamente los productos desde el menú -->
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" id="pedido-cantidad" placeholder="Cantidad" min="1">
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-success" id="agregar-pedido">Agregar</button>
                                                </div>
                                            </div>
                                            <ul class="list-group mt-3" id="lista-pedido">
                                                <!-- Pedidos agregados dinámicamente -->
                                            </ul>
                                        </div>
                                        <!-- Observaciones -->
                                        <div class="mb-3">
                                            <label for="pedido-observaciones" class="form-label">Observaciones</label>
                                            <textarea class="form-control" id="pedido-observaciones" rows="3" placeholder="Ej: Sin cebolla, extra queso..."></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" id="botonMesa1" class="btn btn-primary" form="formTomarPedido">Guardar Pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row"> <!-- Start col -->                      
                        <div class="col-lg-3 col-6" style="margin-top: 20%;"> <!--begin::Small Box Widget 3-->
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>Ocupado</h3>
                                    <p>Mesa Ocupada</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg> <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                 </a>
                            </div> <!--end::Small Box Widget 3-->
                        </div> <!--end::Col-->
                        <div class="col-lg-5 connectedSortable">

                        </div> <!-- /.Start col -->
                    </div> <!-- /.row (main row) -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

        <script>
            const div = document.getElementById('mesa1');
            const boton = document.getElementById('botonMesa1');

            boton.addEventListener('click', () => {
            if (div.classList.contains('text-bg-primary')) {
                div.classList.replace('text-bg-primary', 'text-bg-warning');
            } else {
                div.classList.replace('text-bg-warning', 'text-bg-primary');
            }
            const modal = bootstrap.Modal.getInstance(document.getElementById('ejemplo'));
            modal.hide();
            });
        </script>
<?php require_once 'UI/footer.php'; ?>
