<?php
include "../../inc/function.php";
echo $nom=$_GET["nom"];
echo $genre=$_GET["genre"];
echo $date_naissance=$_GET["date_naissance"];
insertCueilleur($nom,$genre,$date_naissance);
header("Location:../affichages/cueilleur.php");
?>