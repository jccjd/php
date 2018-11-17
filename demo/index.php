<?php

$control=$_GET["controlName"];
require $control.'control.class.php';
$user=new $control;
$cfunction=$_GET["controlFunction"];
$user->$cfunction();
