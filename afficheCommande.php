<?php
// include_once("config.php");
include 'baseAdmin.php';
if(!$_SESSION['username']){
  header('Location: login.php');
}
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5 class="text-center">Liste des commandes confirmer</h5>
      <div class="table-responsive">
     <table class="table  table-striped table-hover">
        <tr> 
        <th>Id_users</th>
        <th>Menu</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Montant</th>
        <th>Date commande</th>
        <th>Date Confirmation</th>

<?php
 $query=mysqli_query($conn,"SELECT * FROM commande ORDER BY id_commande ");
$cnt=1;
$total=0;
$montant=0;
$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr class="">
    <td><?php echo $id_users=$row['id_users'];?></td>
    <td><?php echo $menu=$row['Designation'];?></td>
    <td><?php echo $prix=$row['Prix'];?></td>
    <td><?php echo $Qte=$row['Qte'];?></td>
    <td><?php echo $total= $row['Prix']* $row['Qte'];?></td>
    <td><?php echo $Qte=$row['dateCommande'];?></td>
    <td><?php echo $Qte=$row['dateConfirmation'];?></td>
    <td><?php $montant = $montant += $total;?></td>
</tr>  
 <?php 
$cnt=$cnt+1;
} } else { ?>   
<tr>
    <th style="text-align:center; color:red;" colspan="6">pas de nouveau commande</th>
</tr>
<?php } ?>           
</table>
<legend class=" mt-5" style="color:green; font-weight:bold;">Total: <?php echo $montant." Ar";?></legend>
</div> 
</div>
