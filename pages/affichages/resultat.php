<?php
include "../../inc/function.php";
$date_min=$_GET["date_min"];
$date_max=$_GET["date_max"];
$retour= poidsRestants($date_min,$date_max);
$poid_total_ceuillette =  sumPoidCeuillette($date_min,$date_max); 
$coup_de_reviens = coutDeRevient($date_min,$date_max);

$somme_motant =  sum_v_montants($date_min, $date_max);
$total_depense =   getMontantDepense($date_min, $date_max);
$total_benefice =   Benefice($date_min, $date_max);

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min-1.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Productea</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="../affichages/frontoffice.php"><i class="fas fa-table"></i><span>Ceuillette</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/depense.php"><i class="fas fa-table"></i><span>depense</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/formulaire_date.html"><i class="fas fa-table"></i><span>resultat</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/listpayementceuilleur.php"><i class="fas fa-table"></i><span>list payement ceuilleur</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form  action="../traitement/deconnection.php" method="get" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <p>ProducTea</p>
                            <button class="btn btn-primary" type="submit">deconnection</button>
                        </form>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                    <h2 class="text-center mb-4">Résultats Globaux</h2>
                     <div class="card">
                        <div class="card-body">
                         <h5 class="card-title">Poids Total de Cueillette</h5>
                         <p class="card-text" id="poidsTotalCueillette"><?= $poid_total_ceuillette ?> kg</p>
                        </div>
                       </div>
                     <div class="card mt-3">
                          <div class="card-body">
                          <h5 class="card-title">Poids Restant sur les Parcelles</h5>
                          <p class="card-text" id="poidsRestantParcelles"><?= $retour ?> kg</p>
                     </div>
                    </div>
                  <div class="card mt-3">
                    <div class="card-body">
                      <h5 class="card-title">Coût de Revient par Kg</h5>
                      <p class="card-text" id="coutRevientKg"><?= $coup_de_reviens ?> /kg</p>
                    </div>
                   </div>

                       <div class="card">
                        <div class="card-body">
                         <h5 class="card-title">montant des vente</h5>
                         <p class="card-text" id="poidsTotalCueillette"><?= $somme_motant ?> </p>
                        </div>
                       </div>

                       <div class="card">
                        <div class="card-body">
                         <h5 class="card-title">total depense</h5>
                         <p class="card-text" id="poidsTotalCueillette"><?= $total_depense ?> </p>
                        </div>
                       </div>

                       <div class="card">
                        <div class="card-body">
                         <h5 class="card-title">benefice</h5>
                         <p class="card-text" id="poidsTotalCueillette"><?= $total_benefice ?> </p>
                        </div>
                       </div>
                 </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>ETU-002658 ETU-002757 ETU-2440</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
    <script src="../../assets/js/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>