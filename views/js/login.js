$("#formLogin").on('submit', function (e) {
    e.preventDefault();

    login = $("#login").val();
    clave = $("#clave").val();

    $.post("../ajax/usuario.php?op=verificar",
        { "login": login, "clave": clave },
        function (data) {

            response = JSON.parse(data);
            console.log(response)

            if (data != null) {
                $(location).attr("href", "categorias.php");
            }
            else {
                alert("Usuario y/o Password incorrectos");
            }
        });
})