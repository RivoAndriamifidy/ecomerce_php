<?php
// include_once("config.php");
include 'baseClient.php';
if(!$_SESSION['username']){
  header('Location: login.php');
}
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5 class="text-center">Client en attente de confirmation</h5>
      <div class="table-responsive">
     <table class="table ">
        <tr> 
        <th>Nom</th>
        <th>Menu</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Montant</th>
        <th>Date commande</th>

<?php
$id_users=$rows['id_users'];
 $query=mysqli_query($conn,"select * from pannier where id_users=$id_users");
$cnt=1;
$total=0;
$montant=0;
$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr class="">
<td><?= $rows['username']?></td>
<td><?php echo $menu=$row['Designation'];?></td>
<td><?php echo $prix=$row['Prix'];?></td>
<td><?php echo $Qte=$row['Qte'];?></td>
<td><?php echo $total= $row['Prix']* $row['Qte'];?></td>
<td><?php echo $Qte=$row['dateCommande'];?></td>
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
