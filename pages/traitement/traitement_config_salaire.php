<?php
include "../../inc/function.php";
echo $salaire_kg=$_GET["salaire_kg"];
insertConfigSalaire($salaire_kg);

header("Location:../affichages/config_salaire.php");
?>