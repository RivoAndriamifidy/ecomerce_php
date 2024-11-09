<?php
include 'baseAdmin.php';
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h5>listes des pannier</h5>
      <div class="table-responsive">
     <table class="table ">
        <tr> 
        <th>Client</th>


<?php
 $query=mysqli_query($conn,"select * from pannier where id_users");
 $query=mysqli_query($conn,"select * from users where id_users");
$cnt=1;

$row=mysqli_num_rows($query);
if($row>0){
while($row=mysqli_fetch_array($query))
{
?>
<tr class="">
<td>Pannier de:
    <a href="confirmation.php?getid=<?php echo $row['id_users']?>" class="text-decoration-none"> <?php  echo $id_users=$row['username'];?>
    </a>
    <span class="text-danger"> (new <?php
                  try {
                      //$pdo = new PDO('mysql:host=localhost;dbname=projetphp','root','');
                      $id=$row['id_users'];
                      $sql = "SELECT COUNT(*) AS nb FROM pannier WHERE id_users='$id'";
                      $result = mysqli_query($conn,$sql);
                      $columns = $result->fetch_array();
                      $nb = $columns['nb'];
                      
                      echo $nb;

                  } catch(PDOException $e) {
                      echo 'Erreur PDO : '.$e->getMessage();
                  }
                  ?>)</span>
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

