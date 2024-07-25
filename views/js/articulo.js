var tabla;

function init() {
    mostrarForm(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardarEditar(e);
    });

    // Carga de items al select categoría
    $.post("../ajax/articulo.php?op=selectCategoria", function (r) {
        $("#idcategoria").html(r);
        // $("#idcategoria").selectpicker("refresh");
    });

    $("#imagenmuestra").hide();
}

function limpiar() {
    $("#codigo").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#stock").val("");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#print").hide();
    $("#idarticulo").val("");
}

function mostrarForm(x) {
    limpiar();

    if (x) {
        $("#listadoRegistros").hide();
        $("#formRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
    } else {
        $("#listadoRegistros").show();
        $("#formRegistros").hide();
        $("#btnAgregar").show();
    }
}

function cancelarForm() {
    limpiar();
    mostrarForm(false);
}

function listar() {
    tabla = $("#tablaListado").dataTable({
        "aProcessing": true,    //Activamos el procesamiento del datatables
        "aServerSide": true,    //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip",          //Definimos los elementos del control de tabla
        buttons: [
            "copyHtml5",
            "excelHtml5",
            "csvHtml5",
            "pdf"
        ],
        "ajax": {
            url: "../ajax/articulo.php?op=listar",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText)
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,    //Paginación
        "order": [[0, "desc"]]  //Ordenar (columna, orden)
    }).DataTable();
}

function guardarEditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/articulo.php?op=guardar_editar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (data) {
            bootbox.alert(data);
            mostrarForm(false);
            tabla.ajax.reload();
        }
    })

    limpiar();
}

function mostrar(idarticulo) {
    $.post("../ajax/articulo.php?op=mostrar", { idarticulo: idarticulo }, function (data, status) {
        data = JSON.parse(data);
        mostrarForm(true);

        $("#idcategoria").val(data.idcategoria);
        // $("#idcategoria").selectpicker("refresh");
        $("#codigo").val(data.codigo);
        $("#nombre").val(data.nombre);
        $("#stock").val(data.stock);
        $("#descripcion").val(data.descripcion);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/articulos/" + data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idarticulo").val(data.idarticulo);

        generarbarcode();
    })
}

function desactivar(idarticulo) {
    bootbox.confirm("¿Seguro desea desactivar este artículo?", function (result) {
        if (result) {
            $.post("../ajax/articulo.php?op=desactivar", { idarticulo: idarticulo }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idarticulo) {
    bootbox.confirm("¿Seguro desea activar este artículo?", function (result) {
        if (result) {
            $.post("../ajax/articulo.php?op=activar", { idarticulo: idarticulo }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function generarbarcode() {
    codigo = $("#codigo").val();
    JsBarcode("#barcode", codigo);
    $("#print").show();
}



init();