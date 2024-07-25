<?php
ob_start();
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
} else {
    require './header.php';

    if ($_SESSION['almacen'] == 1) {
?>

<!DOCTYPE html>
<html lang="en">

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
                                <h1 class="box-title">Categorías <button class="btn btn-success" id="btnAgregar"
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
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-body" id="formRegistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-sm-7">

                                            <div class="form-group">
                                                <label>Nombre: </label>
                                                <input type="hidden" name="idcategoria" id="idcategoria">
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    placeholder="Ingresar nombre" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Descripción: </label>
                                                <textarea class="form-control" rows="3" name="descripcion"
                                                    id="descripcion" placeholder="Ingresar descripción"
                                                    required></textarea>
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
                // require_once "footer.php";
                ?>

    </div>
    <!-- ./wrapper -->

    <!-- categoria -->
</body>

</html>

<?php
    } else {
        require 'noacceso.php';
    }
    require_once "footer.php";

    echo '<script type="text/javascript" src="../views/js/categoria.js"></script>';
}
ob_end_flush();
?>