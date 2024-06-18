<?php

require_once('../../Models/validarSesion.php');

$nombreUser = $_POST["nombreUser"];

$passUser = $_POST["passUser"];

$objValidarSesion = new ValidarSesion();

$move = $objValidarSesion->validarSesion($nombreUser, $passUser);