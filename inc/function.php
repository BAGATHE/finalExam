<?php
    include "connection.php";

    function insertCategorieDepense($categorie){
         mysqli_query(connect(), "INSERT INTO categorie_depense values (default,'$categorie')");
    }


    function insertConfigSalaire($salaire_kg){
        mysqli_query(connect(), "INSERT INTO config_salaire values (default,$salaire_kg)");
    }

    function insertCueilleur($nom,$genre,$date_naissance){
        mysqli_query(connect(), "INSERT INTO cueilleur values (default,'$nom','$genre','$date_naissance')");
    }

    function insertParcelle($surface_en_hectare,$id_variete_the){
        mysqli_query(connect(), "INSERT INTO parcelle values (default,'$surface_en_hectare',$id_variete_the)");
    }

    function insertVariete($nom_variete,$occupation,$rendement_mensuel,$prix_vente){
        mysqli_query(connect(), "INSERT INTO variete_the values (default,'$nom_variete',$occupation,$rendement_mensuel,$prix_vente)");
    }
    
    function getVarieteThe(){
        $req = "select * from variete_the";
        $req = mysqli_query(connect(), $req);
        $retour=array();
        while ($data = mysqli_fetch_assoc($req)) {
            $retour[] = array("id_variete_the" => $data['id_variete_the'], "nom_variete" => $data['nom_variete']);
        }
        return $retour;
    }
    function getParcelle(){
        $sql = "SELECT * FROM parcelle";
        $result = mysqli_query(connect(), $sql);
        return $result;
    
    }
    
    
    function getCeuilleur(){
        $sql = "SELECT * FROM cueilleur";
        $result = mysqli_query(connect(), $sql);
        return $result;
    }

    function get_total_ceuillette($idparcelle,$poid_inserer){
        $sql = "SELECT sum(poid_ceuillette) + $poid_inserer as poidtotal from ceuillette where id_parcelle=$idparcelle";
        $result = mysqli_query(connect(),$sql);
        $poid = 0;
        if($data = mysqli_fetch_assoc($result)){
            $poid = $data["poidtotal"];
            if($poid == null){
                $poid=$poid_inserer;
            }
        }
        return $poid;
    }

    function check_reste($idparcelle, $poid_inserer, $date_ceuillette, $id_ceuilleur, $id_parcelle) {
        $ceuillettefaite = get_total_ceuillette($idparcelle, $poid_inserer);
        $sql = "SELECT ((surface_en_hectare * 10000) / ocupation) * rendement_mensuel AS total_rendement
                FROM parcelle
                JOIN variete_the ON parcelle.id_variete_the = variete_the.id_variete_the
                WHERE id_parcelle = $idparcelle";
        $totalrendement = 0;
        $result = mysqli_query(connect(), $sql);
        if ($data = mysqli_fetch_assoc($result)) {
            $totalrendement = $data["total_rendement"];
            if ($totalrendement > $ceuillettefaite) {
                return 1;
            } else {
                return -1;
            }
        }
    }

    function insertCeuillette($idparcelle,$poid_inserer, $date_ceuillette,$id_ceuilleur,$id_parcelle){
        mysqli_query(connect(),"INSERT INTO ceuillette values(default,'$date_ceuillette',$id_ceuilleur,$id_parcelle,$poid_inserer)");
    
    }

    function getHash($pass){
        $rep=mysqli_query(connect(), "select sha1('$pass')");
        $rep=mysqli_fetch_array($rep);
        return $rep[0];
    }
 
    function checkLogin($email, $pass){
        $retour=array();
        $phrase = getHash($pass);
        $req = "select * from user where mdp='$phrase' and email='$email'";
        $req = mysqli_query(connect(), $req);
        $count=0;
        if ($data = mysqli_fetch_assoc($req)) {
            $retour[] = array("id_user" => $data['id_user'], "nom" => $data['nom'],"prenom" => $data['prenom'],"mdp" => $data['mdp'],"email" => $data['email'],"type_user"=>$data['type_user']);
            $count=$count+1;
        }
        if($count!=0){return $retour;}
        else{return false;}
    }
    function get_categorie_depense(){
        $sql="SELECT *from categorie_depense";
        $rep=mysqli_query(connect(), $sql);
        return $rep;
    }

    function insertDepense($date,$categorie,$montant){
        mysqli_query(connect(), "INSERT INTO  depense values (default,'$date',$categorie,$montant)");
    }

    function sumPoidCeuillette($date_min,$date_max){
     $sql=  "SELECT sum(poid_ceuillette) as somme from ceuillette where date_ceuillette >='$date_min' and date_ceuillette <='$date_max'";
     $sql = mysqli_query(connect(), $sql);
     $value=0;
     if($data=mysqli_fetch_assoc($sql)){
        $value=$data["somme"];
     }
     return $value;

    }

    function sumDepenseTotal($date_min,$date_max){
        $sql=  "SELECT sum(montant) as somme from depense where date_depense >='$date_min' and date_depense <='$date_max'";
        $sql = mysqli_query(connect(), $sql);
        $value=0;
        if($data=mysqli_fetch_assoc($sql)){
           $value=$data["somme"];
        }
        return $value;
   
    }

  
    function poidsRestants($date_min,$date_max){
        $sql="SELECT  sum((((surface_en_hectare*1000)/ocupation)*rendement_mensuel)) -sum(poid_ceuillette) as total_rendement from parcelle natural join variete_the natural join ceuillette where 
        date_ceuillette >='$date_min' and date_ceuillette <='$date_max'";
        $sql = mysqli_query(connect(), $sql);
        $retour=0;
        if ($data = mysqli_fetch_assoc($sql)) {
            $retour = $data['total_rendement'];
        }
        
        return $retour;

    }

    function coutDeRevient($date_min,$date_max){
        if(sumPoidCeuillette($date_min,$date_max)== 0){
            return 0;
        }else{
        return sumDepenseTotal($date_min,$date_max)/ sumPoidCeuillette($date_min,$date_max);
        }
    }

    function getMonth($date){ 
        $month = date('m', strtotime($date));
        return $month;
    }

    function getListePaiments($min,$bonus,$malus,$date_min,$date_max){
        $sql="select date_ceuillette, nom,id_parcelle, sum(poid_ceuillette) as somme,case when sum(poid_ceuillette) >$min then $bonus else 0 end as bonus_amount,case when sum(poid_ceuillette) < $min then $malus else 0 end as malus_amount from ceuillette natural join cueilleur where date_ceuillette >='$date_min' and date_ceuillette<='$date_max' group by id_parcelle,ceuillette.id_ceuilleur,date_ceuillette";
        $sql = mysqli_query(connect(), $sql);
        $retour=array();
        while($data=mysqli_fetch_assoc($sql)){
            $retour[]=array("date_ceuillette" => $data['date_ceuillette'],"nom" => $data['nom'],"id_parcelle" => $data['id_parcelle'],"bonus_amount" => $data['bonus_amount'],"malus_amount" => $data['malus_amount']);
        }
        return $retour;
    }
    function montantDesVentes($date_min, $date_max){
        $sql = "CREATE OR REPLACE VIEW v_montants_vente AS SELECT SUM(poid_ceuillette) * prix_vente AS montant_depense FROM ceuillette NATURAL JOIN parcelle NATURAL JOIN variete_the WHERE date_ceuillette >= '$date_min' AND date_ceuillette <= '$date_max' GROUP BY id_variete_the";
        mysqli_query(connect(), $sql);
    }
    
    //to be called
    function sum_v_montants($date_min, $date_max){
        montantDesVentes($date_min, $date_max);
        $sql = "SELECT IFNULL(SUM(montant_depense), 0) AS somme FROM v_montants_vente";
        $result = mysqli_query(connect(), $sql);
        $retour = 0;
        if($data = mysqli_fetch_assoc($result)){
            $retour = $data["somme"];
        }
        return $retour;
    }
    
    function getSalaireKg(){
        $sql = "SELECT salaire_kg FROM config_salaire ORDER BY id_config_salaire DESC LIMIT 1";
        $result = mysqli_query(connect(), $sql);
        $retour = 0;
        if($data = mysqli_fetch_assoc($result)){
            $retour = $data["salaire_kg"];
        }
        return $retour;
    }
    
    function getDepenseBetween($date_min, $date_max){
        $sql = "SELECT IFNULL(SUM(montant), 0) AS montant FROM depense WHERE date_depense >= '$date_min' AND date_depense <= '$date_max'";
        $result = mysqli_query(connect(), $sql);
        $retour = 0;
        if($data = mysqli_fetch_assoc($result)){
            $retour = $data["montant"];
        }
        return $retour;
    }
    
    function getPoidsBetween($date_min, $date_max){
        $sql = "SELECT IFNULL(SUM(poid_ceuillette), 0) AS somme FROM ceuillette WHERE date_ceuillette >= '$date_min' AND date_ceuillette <= '$date_max'";
        $result = mysqli_query(connect(), $sql);
        $retour = 0;
        if($data = mysqli_fetch_assoc($result)){
            $retour = $data["somme"];
        }
        return $retour;
    }
    //to be called
    function getMontantDepense($date_min, $date_max){
        return getPoidsBetween($date_min, $date_max) * getSalaireKg() + getDepenseBetween($date_min, $date_max);
    }
    //to be called
    function Benefice($date_min, $date_max){
        return sum_v_montants($date_min, $date_max) - getMontantDepense($date_min, $date_max);
    }
    



    function deleteInCueillette(){
        mysqli_query(connect(), "DELETE from ceuillette"); 
    }    


?>





