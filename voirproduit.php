<?php
// include_once("config.php");
include 'baseAdmin.php';


if(isset($_POST['submit']))
{
        $name= $_FILES["fic"]["name"];
        $type= $_FILES["fic"]["type"];
        $tmp_name= $_FILES["fic"]["tmp_name"];
        $size= $_FILES["fic"]["size"];
        $error= $_FILES["fic"]["error"];
        $extension= strrchr($name, '.');
        $destination="uploadTest/".$name;
        $exten_val = array('.jpg','.jpeg','.gif','.png','.JPG','.JPEG','.GIF','.PNG');
        if(in_array($extension, $exten_val)){
            move_uploaded_file($tmp_name, $destination);
        }
        else{
            echo '<br> ...FICHEUR INVALID ...<br>';
        }
        $id = $_GET['viewid'];
        $des=$_POST['des'];
        $prix=$_POST['prix'];
        $query=mysqli_query($conn,"UPDATE produit SET Designation='$des',Prix='$prix',image='$name' WHERE id_produit='$id'");
        if($query)
        {
        echo "<script>alert('Modification avec succés!');</script>";
        echo "<script type='text/javascript'> ; </script>";
        }
        else
        {
            echo "<script>alert('Modification echouée!');</script>";
        }
}
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="col-sm-5">
                        <h1><b>Modifications</b></h1>
                    </div>
                     
                </div>
<form method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<?php
$vid=$_GET['viewid'];
$ret=mysqli_query($conn,"select * from produit where id_produit =$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
 <tr>
    <th>id</th>
    <td><input type="text"  name = "id_produit"  value="<?php  echo $row['id_produit'];?>"></td>
 </tr>
 <tr>
    <th>Designation</th>
    <td><input type="text"  name = "des" value="<?php  echo $row['Designation'];?>"></td>
 </tr>
 <tr>
    <th>Prix</th>
    <td><input type="text" name = "prix"  value="<?php  echo $row['Prix'];?>"></td>
  </tr>
  <tr>
    <th>image</th>
    <td><input type="text" name = ""  value="<?php  echo $row['image'];?>"><input type="file" name="fic"></td>
  </tr>
  
<?php 
$cnt=$cnt+1;

}



?>
                 
</tbody>
</table>
<input type="submit" class="btn btn-danger" name="submit" value="Modifier">

</form>
</div>
 
       


