<?php
include "../../inc/function.php";
echo $surface_en_hectare=$_GET["surface_en_hectare"];
echo $id_variete_the=$_GET["id_variete_the"];
//$size=checkSize($id_variete_the,$surface_en_hectare);
insertParcelle($surface_en_hectare,$id_variete_the);
header("Location:../affichages/parcelle.php");
?>




select id_variete_the,id_parcelle,surface_en_hectare*1000, (((surface_en_hectare*1000)/ocupation)*rendement_mensuel) as total_rendement,nom_variete,ocupation,rendement_mensuel from parcelle natural join variete_the where id_parcelle=1;

1/
select sum(poid_ceuillette) from ceuillette where date_ceuillette >='2024-02-01' and date_ceuillette <='2024-09-31';

2/
select  (((surface_en_hectare*1000)/ocupation)*rendement_mensuel) -sum(poid_ceuillette) as total_rendement,id_parcelle from parcelle natural join variete_the natural join ceuillette where 
date_ceuillette >='2024-02-01' and date_ceuillette <='2024-09-31' group by id_parcelle;

3/
select sum(montant) from depense where date_depense >='2024-02-01' and date_depense <='2024-09-31';
