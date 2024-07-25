var tabla;

function init() {
    mostrarForm(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardarEditar(e);
    });
}

function limpiar() {
    $("#idingreso").val("");
    $("#tipo_comprobante").val("");
    $("#serie_comprobante").val("");
    $("#num_comprobante").val("");
    $("#fecha_hora").val("");
    $("#impuesto").val("");
    $("#total_compra").val("");
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
            url: "../ajax/ingreso.php?op=listarDetalle",
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
        url: "../ajax/ingreso.php?op=guardar_editar",
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

function mostrar(idingreso) {
    $.post("../ajax/ingreso.php?op=mostrar", { idingreso: idingreso }, function (data, status) {
        data = JSON.parse(data);
        mostrarForm(true);

        $("#idingreso").val(data.idingreso);
        $("#tipo_comprobante").val(data.tipo_comprobante);
        $("#serie_comprobante").val(data.serie_comprobante);
        $("#num_comprobante").val(data.num_comprobante);
        $("#fecha_hora").val(data.fecha_hora);
        $("#impuesto").val(data.impuesto);
        $("#total_compra").val(data.total_compra);
    })
}

function anular(idingreso) {
    bootbox.confirm("¿Seguro desea anular este ingreso?", function (result) {
        if (result) {
            $.post("../ajax/ingreso.php?op=anular", { idingreso: idingreso }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();