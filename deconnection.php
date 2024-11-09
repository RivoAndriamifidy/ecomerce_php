<?php 
    session_start();
    if(isset($_GET['getid'])){
        session_destroy();
        header('Location: seConnecter.php');
    }
   
?>