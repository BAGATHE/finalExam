<?php
include "../../inc/function.php";

session_start();

echo $date_ceuillette = $_POST["date"];
echo $id_ceuilleur = $_POST["id_ceuilleur"];
echo $poid_inserer = $_POST["poids"];
echo $id_parcelle = $_POST["id_parcelle"];

echo $_SESSION["test"] = $poid_inserer;



$retour = check_reste($id_parcelle,$poid_inserer,$date_ceuillette,$id_ceuilleur,$id_parcelle);

if ($retour==1){
    insertCeuillette($id_parcelle,$poid_inserer,$date_ceuillette,$id_ceuilleur,$id_parcelle);
 
}
    echo json_encode($retour);

header("Content-Type: application/json");

?>

