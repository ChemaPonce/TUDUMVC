<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/registro/view/formulario.php");
            break;

        case 'POST':
            include_once("./app/tareas/repository/tareas.repository.php");

            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            $idusuario = (int) $_SESSION["usuarios"];
            $tarea = new Tarea(0, $idusuario, $titulo, $descripcion, "");

            if ( !TareasRepository::getInstance()->saveNewTarea($tarea) ) {
                $error = TareasRepository::getInstance()->getMysqli()->error;
                header("Location: /MVC/tareas/registro?error=ERROR: {$error}");
                // header("Location: /mvc/tareas/registro?error=ERROR: No fue posible crear la tarea");
                break;
            }

        default:
            header("Location: /MVC/tareas/mi-lista");
            break;
    }