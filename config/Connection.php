<?php

require_once "global.php";

$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($connection, 'SET NAMES "' . DB_ENCODE . '"');

if (mysqli_connect_errno()) {
    printf("Fallo la conexión: %s\n", mysqli_connect_error());
    exit();
}

// Funciones para ejecutar las conexiones
if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql)
    {
        global $connection;
        $query = $connection->query($sql);
        return $query;
    }

    function ejecutarConsultaUnica($sql)
    {
        global $connection;
        $query = $connection->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function ejecutarConsulta_retornarID($sql)
    {
        global $connection;
        $query = $connection->query($sql);
        return $connection->insert_id;
    }

    function limpiarCadena($str)
    {
        global $connection;
        $str = mysqli_real_escape_string($connection, trim($str));
        return htmlspecialchars($str);
    }
}