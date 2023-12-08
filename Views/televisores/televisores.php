<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Televisores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_usuario">
                        Nuevo Televisor
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Marca</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pulgadas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tasa de refresco</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_televisores">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_televisores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="nombre">Marca</label>
                        <input type="text" required class="form-control" id="marca" name="marca" placeholder="Marca">
                    </div>
                    <div class="form-group">
                        <label for="Apellidos">Pulgadas</label>
                        <input type="text" required class="form-control" id="pulgadas" name="pulgadas" placeholder="Pulgadas">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Cantidad</label>
                        <input type="text" required class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                    </div>
                    
                    <div class="form-group">
                        <label for="Correo">Tasa de refresco</label>
                        <input type="text" required onfocusout="verifica_correo()" class="form-control" id="tasaRefresco" name="tasaRefresco" placeholder="Tasa Refresco">
                        <div class="alert alert-danger d-none" role="alert" id="CorreoRepetido">
                        </div>
                    </div>                                      

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="televisores.controller.js"></script>
<script src="televisores.model.js"></script>