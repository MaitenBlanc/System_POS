var tabla;

function init() {
    mostrarForm(false);
    listar();
}

function mostrarForm(x) {
    // limpiar();

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
            url: "../ajax/permiso.php?op=listar",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText)
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,    //Paginación
        "order": [[0, "desc"]]    //Ordenar (columna, orden)
    }).DataTable();
}


init();