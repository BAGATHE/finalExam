<?php
session_start();
$_SESSION["poid_minimal"]=$_GET["poid_minimal"];
$_SESSION["bonus"]=$_GET["bonus"];
$_SESSION["malus"]=$_GET["malus"];
header("Location:../affichages/quotaceuilleure.html");
?>
