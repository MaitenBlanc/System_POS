var tabla;

function init() {
    mostrarForm(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardarEditar(e);
    });

    $("#imagenmuestra").hide();
    // Mostrar permisos
    $.post("../ajax/usuario.php?op=permisos&id=", function (r) {
        $("#permisos").html(r);
    });
}

function limpiar() {
    $("#nombre").val("");
	$("#num_documento").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#cargo").val("");
	$("#login").val("");
	$("#clave").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idusuario").val("");
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
            url: "../ajax/usuario.php?op=listar",
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
        url: "../ajax/usuario.php?op=guardar_editar",
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

function mostrar(idusuario) {
    $.post("../ajax/usuario.php?op=mostrar", { idusuario: idusuario }, function (data, status) {
        data = JSON.parse(data);
        mostrarForm(true);

        $("#nombre").val(data.nombre);
        console.log(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/usuarios/" + data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idusuario").val(data.idusuario);
        
    });

    $.post("../ajax/usuario.php?op=permisos&id=" + idusuario, function (r) {
        $("#permisos").html(r);
    });
}

function desactivar(idusuario) {
    bootbox.confirm("¿Esta seguro de desactivar este usuario?", function (result) {
        if (result) {
            $.post("../ajax/usuario.php?op=desactivar", { idusuario: idusuario }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idusuario) {
    bootbox.confirm("¿Esta seguro de activar este usuario?", function (result) {
        if (result) {
            $.post("../ajax/usuario.php?op=activar", { idusuario: idusuario }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();