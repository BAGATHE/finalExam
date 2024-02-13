<?php
include "../../inc/function.php";
$email=$_GET["email"];
$password=$_GET["mdp"];
session_start();
$member=checkLogin($email, $password);
if($member===false){header("Location:../affichages/client_login.php"); return 0;}
else{
    $_SESSION["id"]=$member[0]["id"];
    $_SESSION["nom"]=$member[0]["nom"];
    $_SESSION["prenom"]=$member[0]["prenom"];
    $_SESSION["email"]=$member[0]["email"];
    $_SESSION["type_user"]=$member[0]["type_user"];
    header("Location:../affichages/frontoffice.php");
}
?>