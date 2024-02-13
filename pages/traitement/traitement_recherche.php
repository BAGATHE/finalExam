<?php
include("../../inc/function.php"); 
header("Content-Type: application/json");
$date = $_POST['date'];
$reponse[] = array();
$previsionparparcelle = array(); 
$previsionparparcelle = previsionByParcelle($date);
$montanttotal =  sommeMontant($date);
$restepoid =  sommeReste($date);
$response[]= array("previsionbyparcelle"=>$previsionparparcelle,"montant"=>$montanttotal,"restepoid"=>$restepoid);
echo json_encode($response);
?>
