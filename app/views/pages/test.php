<?php

session_start();
require_once '../../model/Usuario.php';



$usuario = new Usuario();

echo $_SESSION['usuario']['id'];
?>