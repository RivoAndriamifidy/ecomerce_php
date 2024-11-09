<?php
// include_once("config.php");
include 'baseAdmin.php';
 
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5 class="text-center">Liste des Clients</h5>
      <div class="table-responsive">
     <table class="table ">
        <tr> 
            <th>Id</th>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Adresse</th>
        </tr>

<?php
 $query=mysqli_query($conn,"select * from users order by id_users desc");
$cnt=1;
$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $id=$row['id_users'];?></td>
<td><?php echo $nom=$row['username'];?></td>
<td><?php echo $prix=$row['email'];?></td>
<td><?php echo $prix=$row['Contact'];?></td>
<td><?php echo $prix=$row['Adresse'];?></td>
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
