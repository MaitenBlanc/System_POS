<!DOCTYPE html>
<html lang="en">

<?php require_once "header.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo $ruta; ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php require_once "nav.php"; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once "menu.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h1 class="box-title">Proveedor <button class="btn btn-success" id="btnAgregar"
                                        onclick="mostrarForm(true)"><i class="fa fa-plus-circle"></i>
                                        Agregar</button>
                                </h1>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            <div class="panel-body table-responsive" id="listadoRegistros">
                                <table id="tablaListado"
                                    class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Número</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Número</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-body" id="formRegistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre: </label>
                                                <input type="hidden" name="idpersona" id="idpersona">
                                                <input type="hidden" name="tipo_persona" id="tipo_persona"
                                                    value="Proveedor">
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    placeholder="Ingresar nombre" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipo de documento: </label>
                                                <select name="tipo_documento" class="form-control" id="tipo_documento">
                                                    <option>-- Seleccionar tipo de docuemento --</option>
                                                    <option value="RUC">Ruc</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                    <option value="DNI">DNI</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Número de documento: </label>
                                                <input type="text" name="num_documento" class="form-control"
                                                    id="num_documento" placeholder="Ingresar documento"></input>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Dirección: </label>
                                                <input type="text" class="form-control" name="direccion" id="direccion"
                                                    placeholder="Ingresar dirección" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Teléfono: </label>
                                                <input type="text" class="form-control" name="telefono" id="telefono"
                                                    placeholder="Ingresar teléfono" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email: </label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Ingresar email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                class="fa fa-save"></i> Guardar</button>

                                        <button class="btn btn-danger" onclick="cancelarForm()" type="button"><i
                                                class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                </form>
                            </div>
                            <!--Fin centro -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <?php
        require_once "footer.php";
        ?>

    </div>
    <!-- ./wrapper -->

    <!-- articulo -->
    <script type="text/javascript" src="../views/js/proveedor.js"></script>
</body>

</html>