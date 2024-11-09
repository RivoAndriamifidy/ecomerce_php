<?php
include 'baseAdmin.php';


?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5>Client en attente de confirmation</h5>
    <form action="" method="POST">
      <div class="table-responsive">
     <table class="table ">
        <tr> 
        <th>Id_users</th>
        <th>Id_pannier</th>
        <th>Menu</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Montant</th>
        <th>Date commande</th>
        <th>Date confirmation</th>

<?php
$getid=$_GET['getid'];
 $query=mysqli_query($conn,"select * from pannier where id_users=$getid");
$cnt=1;
$total=0;
$montant=0;
$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr class="">
<td><?php echo $id_users=$row['id_users']?></td>
<td><?php echo $id_pannier=$row['id_pannier'];?></td>
<td><?php echo $menu=$row['Designation'];?></td>
<td><?php echo $prix=$row['Prix'];?></td>
<td><?php echo $Qte=$row['Qte'];?></td>
<td><?php echo $total= $row['Prix']* $row['Qte'];?></td>
<td><?php echo $dateCmd=$row['dateCommande'];?></td>
<td><a href="voir.php?voirid=<?php echo $row['id_pannier']?>" class="btn btn-warning">Voir</a></td>
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


</form>
</div> 
</div>

