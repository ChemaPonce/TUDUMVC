<?php
session_start();
function checkSession(): bool {
    return isset($_SESSION['usuarios']) && $_SESSION['usuarios'] != null;
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Chema" content="chemaponce10@gmail.com">
    <title>Practica mvc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./style.css">


</head>
<body>

    <!-- <h1>Hola Gente</h1> -->
    <?php 

    $request_url = $_SERVER['REQUEST_URI'];
    $request_method = $_SERVER['REQUEST_METHOD'];
    //echo $request_url;

    $request_components = parse_url($request_url);
    if(count($request_components)> 1)
    {
    parse_str($request_components['query'], $query_params);
    $params = json_encode($query_params);
    }
    $path = ltrim($request_components['path'],"/");
    $path_components = explode("/", $path);
    $components = json_encode($path_components);

    // $query
    //echo"
    //<br>

    //<h2>Recuro Solicitado: {$request_components['path']}</h2>
    //<h3>Query params: {$params}</h3>
    //<h3>Componentes URL: {$components}</h3>
    //";

    require_once("./app.controller.php");

    ?>

</body>

</html>
