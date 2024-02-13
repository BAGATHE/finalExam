<?php
include "../../inc/function.php";
echo $nom_variete=$_GET["nom_variete"];
echo $occupation=$_GET["occupation"];
echo $rendement_mensuel=$_GET["rendement_mensuel"];
echo $prix_vente = $_GET["prix_vente"];
insertVariete($nom_variete,$occupation,$rendement_mensuel,$prix_vente);
header("Location:../affichages/variete.php");
?>