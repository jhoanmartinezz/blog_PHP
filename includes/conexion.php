<?php

$server = "localhost";
$username = "root";
$password = "";
$databse = "blog";

$db = mysqli_connect($server, $username, $password, $databse);

mysqli_query($db, "SET NAMES 'utf-8'");

//iniciar sesion para los que navegan en la pagina
session_start();
