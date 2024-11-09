<?php
// include_once("config.php");
include 'baseAdmin.php';
if(isset($_POST['submit']))
{
    $id_pannier=$_POST['id_pannier'];
	$id_users=$_POST['id_users'];
	$designation=$_POST['des'];
	$prix=$_POST['prix'];
	$qte=$_POST['Qte'];
	$datecom=$_POST['datecom'];
    $datecnf=$_POST['dateconf'];
	$query=mysqli_query($conn,"INSERT INTO `commande` (`id_pannier`,`id_users`, `Designation`, `Prix`, `Qte`, `dateCommande`,`dateConfirmation`) VALUES ( '$id_pannier','$id_users', '$designation', '$prix', '$qte', '$datecom', '$datecnf')");
  if($query)
	{
	echo "<script>alert('Commande confirmé avec succés!');</script>";
    $rid = $_POST['id_pannier'];
    $sql = mysqli_query($conn,"DELETE FROM `pannier` WHERE `pannier`.`id_pannier` = $rid");
    echo "<script type='text/javascript'> document.location ='client.php'; </script>";
	}
	else
	{
		echo "<script>alert('Impossible de confirmer la commande');</script>";
        echo "Error".$query."<br>".$conn->error;
	}

}

?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="col-sm-5">
                        <h1><b> Confirmé </b>(apres verification)</b></h1>
                    </div>
                     
                </div>
<form method="POST">
<?php
$vid=$_GET['voirid'];
$req=mysqli_query($conn,"select * from pannier where id_pannier =$vid");
$cnt=1;
while ($row=mysqli_fetch_array($req)) {

?>
 
    <strong >id_pannier</strong>
    <input type="text"  name = "id_pannier" class="form-control" value="<?php  echo $row['id_pannier'];?>">
 
    <strong>Id_users</strong>
    <input type="text"  name = "id_users" class="form-control" value="<?php  echo $row['id_users'];?>">
 
    <strong>Designation</strong>
    <input type="text" name = "des" class="form-control"  value="<?php  echo $row['Designation'];?>">
   
  
    <strong>Prix</strong>
    <input type="text" name = "prix" class="form-control" value="<?php  echo $row['Prix'];?>">
	


  
    <strong>Quantite</strong>
    <td ><input type="text" name = "Qte" class="form-control" value="<?php  echo $row['Qte'];?>">
	
 
    <strong>Date commande</strong>
    <input type="text"  name = "datecom" class="form-control" value="<?php  echo $row['dateCommande'];?>">
    
 <?php 
$cnt=$cnt+1;

}



?>

<strong for="">Date confirmation</strong>
<input type="date"  name="dateconf" value="<?= date('Y-m-d')?>"class="form-control">
<a href="Confirmation.php"><input type="submit" name="submit" value="Confirmer"  class="btn btn-success w-100 mt-2" /></a>

</form>
</div>
 
       


