<?php  
include 'config.php';
if(isset($_GET['delid'])){
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($conn,"DELETE FROM `pannier` WHERE `pannier`.`id_pannier` = $rid");
    echo "<script>alert('Produit supprimer de votre pannier');</script>";
    header ('Location: affichepannier.php');
}
?>