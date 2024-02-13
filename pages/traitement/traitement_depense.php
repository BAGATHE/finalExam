<?php
include("../../inc/function.php");
$date =$_POST["date"];
$categorie = $_POST["categorie"];
$montant = $_POST["montant"];
insertDepense($date,$categorie,$montant);
header("Location:../affichages/depense.php");

?>