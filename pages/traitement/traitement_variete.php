<?php
include "../../inc/function.php";
echo $nom_variete=$_GET["nom_variete"];
echo $occupation=$_GET["occupation"];
echo $rendement_mensuel=$_GET["rendement_mensuel"];
insertVariete($nom_variete,$occupation,$rendement_mensuel);
header("Location:../affichages/variete.php");
?>