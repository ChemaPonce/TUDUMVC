<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/presentacion/view/PaginadePresentacion.html");
        break;
    
    default:
    header("HTTP/1.1 404 Not Found");
        break;
}