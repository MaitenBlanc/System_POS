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
                                <h1 class="box-title">Artículos <button class="btn btn-success" id="btnAgregar"
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
                                        <th>Categoría</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Categoría</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-body" id="formRegistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre: </label>
                                                <input type="hidden" name="idarticulo" id="idarticulo">
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    placeholder="Ingresar nombre" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Categoría: </label>
                                                <select name="idcategoria" class="form-control"
                                                    id="idcategoria"></select>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Stock: </label>
                                                <input type="text" class="form-control" name="stock" id="stock"
                                                    placeholder="Ingresar cantidad" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Descripción: </label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    id="descripcion" placeholder="Ingresar descripción" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Imagen: </label>
                                                <input type="file" class="form-control" name="imagen" id="imagen">
                                                <input type="hidden" name="imagenactual" id="imagenactual"><br>
                                                <img src="" width="150px" height="120px" id="imagenmuestra">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Código: </label>
                                                <input type="text" class="form-control" name="codigo" id="codigo"
                                                    placeholder="Ingresar código" required><br>
                                                <button class="btn btn-success" type="button"
                                                    onclick="generarbarcode()">Generar</button>

                                                <div id="print" style="display: inline-block;">
                                                    <svg id="barcode"></svg>
                                                </div>

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
    <script type="text/javascript" src="../views/js/articulo.js"></script>
</body>

</html>