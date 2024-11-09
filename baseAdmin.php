<?php
include 'config.php';
session_start();
if(!$_SESSION['username']){
  header('location:seConnecter.php');
}
?>
<html lang="fr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Admin</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link href="css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cssjs/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">COCOPIZZA</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-red w-100 rounded-0 border-0 bg-dark" disabled type="" placeholder="" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="">Deconnection</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse " >
      <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
      <li class="nav-item">
            <a class="nav-link text-light" href="afficheclient.php">
              <span data-feather="file" class="align-text-bottom"></span>
              <i class="fa fa-user-circle-o me-1" aria-hidden="true"></i>
              <?php
                            if(isset($_SESSION['username'])){
                                $id_users=$_SESSION['id_users'];
                               
                                $query  = mysqli_query($conn,"SELECT * FROM `users` WHERE id_users=$id_users");
                                $rows = mysqli_fetch_array($query);
                            }
                            echo "Bienvenue " .$rows['username'];
                            ?> 
            </a>
          </li>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Client</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
          <li class="nav-item">
            <a class="nav-link text-light" href="client.php">
              <span data-feather="file" class="align-text-bottom"></span>
              <i class="fa fa-user-times me-1" aria-hidden="true"></i> Commande en attente

              
              <span class=" badge  bg-danger">
                                    
                <?php
                  try {
                      //$pdo = new PDO('mysql:host=localhost;dbname=projetphp','root','');

                      $sql = 'SELECT COUNT(*) AS nb FROM pannier';
                      $result = mysqli_query($conn,$sql);
                      $columns = $result->fetch_array();
                      $nb = $columns['nb'];
                      
                      echo $nb;

                  } catch(PDOException $e) {
                      echo 'Erreur PDO : '.$e->getMessage();
                  }
                  ?>
              </span>
              
              

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="afficheCommande.php">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              <i class="fa fa-check-square-o me-1" aria-hidden="true"></i>Commande confirmé
              <span class=" badge  bg-danger">
                                    
                <?php
                  try {
                      //$pdo = new PDO('mysql:host=localhost;dbname=projetphp','root','');

                      $sql = 'SELECT COUNT(*) AS nb FROM commande';
                      $result = mysqli_query($conn,$sql);
                      $columns = $result->fetch_array();
                      $nb = $columns['nb'];
                      
                      echo $nb;

                  } catch(PDOException $e) {
                      echo 'Erreur PDO : '.$e->getMessage();
                  }
                  ?>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="afficheClient.php">
              <span data-feather="users" class="align-text-bottom"></span>
              <i class="fa fa-id-card me-1" aria-hidden="true"></i>Listes des clients
              <span class=" badge  bg-danger">
                                    
                  <?php
                    try {
                        //$pdo = new PDO('mysql:host=localhost;dbname=projetphp','root','');
  
                        $sql = 'SELECT COUNT(*) AS nb FROM users';
                        $result = mysqli_query($conn,$sql);
                        $columns = $result->fetch_array();
                        $nb = $columns['nb'];
                        
                        echo $nb;
  
                    } catch(PDOException $e) {
                        echo 'Erreur PDO : '.$e->getMessage();
                    }
                    ?>
                </span>
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>produit</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link text-light" href="afficheproduit.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              <i class="fa fa-product-hunt me-1" aria-hidden="true"></i>Liste des Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="publierProduit.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              <i class="fa fa-pencil-square-o me-1" aria-hidden="true"></i> Ajouter  nouveau produit
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>menu</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
          
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link text-light" aria-current="page" href="accueil.php">
                <span data-feather="home" class="align-text-bottom"></span>
                <i class="fa fa-home me-1" aria-hidden="true"></i>Voir le site
              </a>
            </li>
          </ul>
      </div>
    </nav>
  </div>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>
      <script src="cssjs/dashboard.js"></script>
  

</body></html>