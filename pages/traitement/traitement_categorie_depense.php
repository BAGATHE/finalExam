<?php
include "../../inc/function.php";
echo $categorie=$_GET["categorie"];
insertCategorieDepense($categorie);
header("Location:../affichages/categorie_depense.php");

?>