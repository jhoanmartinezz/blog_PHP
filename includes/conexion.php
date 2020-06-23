<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "blog";

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf-8'");

//iniciar sesion para los que navegan en la pagina
if(!isset($_SESSION)){
    session_start();
}
