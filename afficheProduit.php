<?php
// include_once("config.php");
include 'baseAdmin.php';

?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5 class="text-center">Liste des Produits</h5>
      <div class="table-responsive">
     <table class="table ">
        <tr> 
            <th>Id</th>
            <th>Designation</th>
            <th>Prix</th>
            <th>image</th>
            <th>Action</th>
        </tr>

<?php
 $query=mysqli_query($conn,"select * from produit order by id_produit desc");
$cnt=1;
$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $id=$row['id_produit'];?></td>
<td><?php echo $nom=$row['Designation'];?></td>
<td><?php echo $prix=$row['Prix'];?></td>
<td><img src="uploadTest/<?php echo $Qte=$row['image'];?>" alt="" width="50px" height="50px"></td>

<td>
  <a href="voirproduit.php?viewid=<?php echo($row['id_produit']);?>" class="btn btn-primary" title="View" data-toggle="tooltip">Edit</a>
</td>
 </tr>  
 <?php 
$cnt=$cnt+1;
} } else { ?>   
<tr>
    <th style="text-align:center; color:red;" colspan="6">pas de nouveau commande</th>
</tr>
<?php } ?>           
</table>
</div> 
</div>
