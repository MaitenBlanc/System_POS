<!DOCTYPE html>
<html lang="en">

<?php require_once "header.php" ?>

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
                                <h1 class="box-title">Ingresos <button class="btn btn-success" id="btnAgregar"
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
                                        <th>ID Proveedor</th>
                                        <th>ID Usuario</th>
                                        <th>Tipo de Comprobante</th>
                                        <th>Serie del Comprobante</th>
                                        <th>Número de Comprobante</th>
                                        <th>Fecha</th>
                                        <th>Impuesto</th>
                                        <th>Total Compra</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Tipo de Comprobante</th>
                                        <th>ID Proveedor</th>
                                        <th>ID Usuario</th>
                                        <th>Serie del Comprobante</th>
                                        <th>Número de Comprobante</th>
                                        <th>Fecha</th>
                                        <th>Impuesto</th>
                                        <th>Total Compra</th>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-body" id="formRegistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ID Proveedor: </label>
                                                <input type="hidden" name="idingreso" id="idingreso">
                                                <input type="text" class="form-control" name="idproveedor"
                                                    id="idproveedor" placeholder="Ingresar ID proveedor" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ID Usuario: </label>
                                                <input type="hidden" name="idingreso" id="idingreso">
                                                <input type="text" class="form-control" name="idusuario" id="idusuario"
                                                    placeholder="Ingresar ID usuario" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipo de Comprobante: </label>
                                                <input type="text" class="form-control" name="tipo_comprobante"
                                                    id="tipo_comprobante" placeholder="Ingresar tipo de comprobante"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Serie del Comprobante: </label>
                                                <input type="text" class="form-control" name="serie_comprobante"
                                                    id="serie_comprobante" placeholder="Ingresar serie del comprobante"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Número de Comprobante: </label>
                                                <input type="text" class="form-control" name="num_comprobante"
                                                    id="num_comprobante" placeholder="Ingresar número de comprobante"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha: </label>
                                                <input type="text" class="form-control" name="fecha_hora"
                                                    id="fecha_hora" placeholder="Ingresar fecha" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Impuesto: </label>
                                                <input type="text" class="form-control" name="impuesto"
                                                    id="impuesto" placeholder="Ingresar impuesto" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Total Compra: </label>
                                                <input type="text" class="form-control" name="total_compra"
                                                    id="total_compra" placeholder="Ingresar total de la compra" required>
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
    <script type="text/javascript" src="../views/js/ingreso.js"></script>
</body>

</html>