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
                    <li class="nav-item"><a class="nav-link active" href="../affichages/backoffice.html"><i class="fas fa-tachometer-alt"></i><span>Variete de thé</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/parcelle.php"><i class="fas fa-table"></i><span>parcelle</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/cueilleur.php"><i class="fas fa-user"></i><span>Ceuilleur</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/ceuillette.php"><i class="fas fa-table"></i><span>Ceuillette</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/categorie_depense.php"><i class="fas fa-table"></i><span>Categorie depense</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../affichages/config_salaire.php"><i class="fas fa-table"></i><span>Configuration salaire</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <p>ProducTea</p>
                        </form>
                    </div>
                </nav>
                <div class="row">
                   <div class="col-md-6 mx-auto">
                   <h2 class="text-center mb-4">Configuration Montant Salarial</h2>
                     <form action="../traitement/traitement_config_salaire.php" method="get">
                     <div class="form-group"><label class="form-label" for="montantSalarial">Montant Salarial par Kg :</label>
                     <input class="form-control form-control" type="number" id="montantSalarial" name="salaire_kg" placeholder="Entrez le montant salarial par kg" required="" step="0.01"></div><button class="btn btn-primary btn-block" type="submit">Enregistrer</button>
                     </form>
                   </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2024</span></div>
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