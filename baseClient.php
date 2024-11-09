<?php
include 'config.php';
session_start();
if(!$_SESSION['username']){
    header('location:seConnecter.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css1/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<body></body>
        <div class = "container-fluid  sticky-top opac">
            <div class = "">
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger position-fixed">
                    <div class="">
                        

                            <?php
                            if(isset($_SESSION['username'])){
                                $id_users=$_SESSION['id_users'];
                               
                                $query  = mysqli_query($conn,"SELECT * FROM `users` WHERE id_users=$id_users");
                                $rows = mysqli_fetch_array($query);

                                ?>
                                <div class="dropdown">
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bienvenue<i class="fa fa-user-circle-o fa-2x ms-5 align-self-center" aria-hidden="true"></i>
                                    <strong> <?= $rows['username']?></strong>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-primary shadow text-black">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-user-circle-o fa-2x ms-5" aria-hidden="true"></i>
                                                
                                            <a class="ms-4"><h5><?= $rows['email']?></h5></a>
<hr>
                                            <p>
                                                <a href="deconnection.php?getid=<?=$id_users?>"  title="View" data-toggle="tooltip">Deconection</a>
                                            </p>
                                            <p>
                                                <a href="affichePannier.php" class="text-black text-decoration-none"><i class="fa fa-cart-plus fa-2x" aria-hidden="true">(
                                                    <?php
                                                        try {
                                                            //$pdo = new PDO('mysql:host=localhost;dbname=projetphp','root','');
                                                                $id=$rows['id_users'];
                                                            $sql = "SELECT COUNT(*) AS nb FROM pannier WHERE id_users='$id'";
                                                            $result = mysqli_query($conn,$sql);
                                                            $columns = $result->fetch_array();
                                                            $nb = $columns['nb'];
                                                            
                                                            echo $nb;

                                                        } catch(PDOException $e) {
                                                            echo 'Erreur PDO : '.$e->getMessage();
                                                        }
                                                    ?>)dans le pannier</i></a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                    <?php
                                }else{
                                    ?>
                                <div class="dropdown ">
                                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user-circle-o fa-2x ms-5" aria-hidden="true"></i>
                                        <strong></strong>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-primary shadow text-black">
                                                <p>
                                                    <a href="seConnecter.php" class="text-black text-decoration-none">Connection  <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                                </p>
                                                <p>
                                                    <a href="Sinscrire.php" class="text-black text-decoration-none">S'inscrire  <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                                </p>                                      
                                            </a>
                                        </ul>
                                </div>

                                <?php
                            }
                            ?>
                         </div>
                    </div>
                </nav>
            </div>
        </div>
<div class="head">
    <div class="img-slide">
            <img src="img/slide1.png" alt="">
        </div>
    <div class="lignes">
        <div class="l1"></div>
        <div class="l2"></div>
    </div>
    <div class="container-1">
        <h1><span>Votre </span><span>resto </span><span>en </span><span>ligne</span></h1>
        <div class="container-btns">
             <a href="accueil.php"><button class="btn-first b1">Accueil</button></a>
             <button class="btn-first b1">Contacter</button>
            
        </div>
    </div>
    <ul class="medias">
        <li class="bulle"><a href=""><img src="img/facebook.png" alt="" class="logo-medias"></a></li>
        <li class="bulle"><a href=""></a><img src="img/instagram.png" alt="" class="logo-medias"></a></li>
        <li class="bulle"><a href=""></a><img src="img/twitter.png" alt="" class="logo-medias"></a></li>
    </ul>
</div>

    <script src="js/bootstrap.js"></script>
</body>
</html>