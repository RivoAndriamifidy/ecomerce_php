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

        $des=$_POST['des'];
        $prix=$_POST['prix'];
        $query=mysqli_query($conn,"INSERT INTO produit(designation, prix,image) VALUES('$des','$prix','$name')");
        if($query)
        {
        echo "<script>alert('Produit publier avec succés!');</script>";
        echo "<script type='text/javascript'> ; </script>";
        // header('location: publierProduit.php');
        }
        else
        {
            echo "<script>alert('Publication echouée!');</script>";
        }
}
 ?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h3>insertion </h3>
		<hr >
		<form name="insert" action="" method="post" enctype="multipart/form-data">
     <table width="100%"  border="0" class="table">
    <tr>
    <th height="62" scope="row">Designation </th>
    <td width="71%"><input type="text" name="des" id="name" value=""   required /></td>
  </tr>  
  <tr>
    <th height="62" scope="row">Prix</th>
    <td width="71%"><input type="text" name="prix" id="email" value=""   required /></td>
  </tr>
  <tr>
    <th>inserer image</th>
    <td><input type="file" name="fic"></td>
  </tr>
  <tr>
    <th height="62" scope="row"></th>
    <td width="71%"><input type="submit" name="submit" value="Publier" class="btn btn-warning" /> </td>
  </tr>
</table>
 </form>

      </div>
    </div>
    <hr>
        
   
  </div>
</div>

 
