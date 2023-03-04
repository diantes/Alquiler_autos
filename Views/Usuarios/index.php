<?php include "Views/Templates/header.php"; ?>
<button class="btn btn-outline-primary mb-2" type="button" onclick="frmUsuario();"><i class="fas fa-plus"></i></button>
<a class="btn btn-outline-warning mb-2" href="<?php echo base_url; ?>Usuarios/inactivos"><i class="fas fa-trash"></i></a>
<div class="card">
    <div class="card-header bg-info text-white">
        Usuarios
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover display responsive nowrap" id="tblUsuarios" style="width: 100%;">
                <thead class="bg-info text-white">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="title">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formulario" onsubmit="registrarUser(event);" autocomplete="off">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <div>
                            Todo los campos con <span class="text-danger fw-bold">*</span> son obligatorio.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="El usuario es requerido">
                                <input type="hidden" id="id" name="id">
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                                <label for="usuario"><i class="fas fa-id-card"></i> Usuario <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="El nombre es requerido">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del usuario" required>
                                <label for="nombre"><i class="fas fa-list"></i> Nombre <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="El correo es requerido">
                                <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo electrónico" required>
                                <label for="correo"><i class="fas fa-envelope"></i> Correo <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="El correo es requerido">
                                <input id="telefono" class="form-control" type="number" name="telefono" placeholder="Teléfono" required>
                                <label for="telefono"><i class="fas fa-phone"></i> Teléfono <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="La contraseña es requerido">
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                                <label for="clave"><i class="fas fa-key"></i> Contraseña <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar contraseña">
                                <label for="confirmar"><i class="fas fa-lock"></i> Confirmar Contraseña <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit" id="btnAccion"> Registrar</button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>