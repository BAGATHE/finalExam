<?php
session_start();
$_SESSION["mois"]=array();
$_SESSION["mois"]=$_GET["mois"];
header("Location:../affichages/regeneration-the.html");
?>