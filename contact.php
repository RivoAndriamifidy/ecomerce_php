<?php
include 'baseClient.php';
if(isset($_POST['submit']))
{
  $id_users=$_POST['id_users'];
	$menu=$_POST['menu'];
	$prix=$_POST['prix'];
	$Qte=$_POST['Qte'];
	$date=$_POST['dateCommande'];
	$query=mysqli_query($conn,"INSERT INTO `pannier` (`id_users`, `Designation`, `Prix`, `Qte`,`dateCommande`) VALUES ( '$id_users', '$menu', '$prix', '$Qte', '$date')");
	if($query)
	{
	echo "<script>alert('Merci pour votre fidelité! vous recevez un message par email pour la confirmation!!');</script>";
	echo "<script type='text/javascript'> document.location ='Accueil.php'; </script>";
	}
	else
	{
		echo "<script>alert('Data not inserted');</script>";
        echo "Error".$query."<br>".$conn->error;
	}
}
 ?>

	<head>
		
		<title>Contact</title>
		
	</head>

        
		<hr >
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
              <img src="uploadTest/83168-login-success.gif" alt="" class="d-flex align-items-center justify-content-center">
      </div>

  <div class="col-lg-6">
      <h3 style="text-align: center;">Formulaire de contact</h3>
      <p  style="text-align: center;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aliquam nihil cum fuga at! Veritatis, quas sequi. Fuga dolore, quibusdam accusantium impedit eveniet commodi. Accusantium nemo delectus voluptas temporibus libero.</p>
    <form name="insert" action="" method="post"><table width="100%"  border="0" class="table">
      
        <strong>Id_users</strong>
        <input type="text" name="id_users" id="id_users" value="<?= $rows['id_users']?>"  class="form-control"  />
      
        
        <strong>Nom </strong>
        <input type="text" name="name" id="name" value="<?= $rows['username']?>"  class="form-control"  />
        
      
        <strong>Email</strong>
        <input type="email" name="email" id="email" value="<?= $rows['email']?>"   class="form-control"  />
      
      
        <strong>Contact</strong>
        <input type="tel" name="contact" id="telNo" value="<?= $rows['Contact']?>"   class="form-control" maxlength="10"  />
      
      
        <strong>Adresse</strong>
        <input name="address"  class="form-control"  value="<?= $rows['Adresse']?>"></input> 
      
    
    <?php
        $reid=$_GET['recupid'];
        $recupArticle = mysqli_query($conn,"SELECT * FROM produit WHERE id_produit= $reid");
        $cnt = 1;
        while($article = mysqli_fetch_array($recupArticle)){
          ?>
        
            <strong>votre commande</strong>
            <input type="text" name="menu" class="form-control" value="<?=  $article['Designation'];?>" >
        
        
            <strong>prix</strong>
            <input type="text" name="prix" value="<?=  $article['Prix'];?>" class="form-control"></input> <br>
        
        
            <strong>Image</strong>
            <img src="uploadTest/<?= $article['image'];?>" alt="" width="70px" height="70px" class="m-3"></input><br>
        
        <?php $cnt = $cnt+1;}  ?>
      
      
        <strong>Quantité</strong>
        <input type="number" name="Qte"  class="form-control"></input> 
      
      
        <strong>Date commande</strong>
        <input type="Date" name="dateCommande"  class="form-control" value="<?= date('Y-m-d') ?>" ></input> 
      
    
        <input type="submit" name="submit" value="Ajouter dans le pannier" class="btn btn-success w-100 mt-3" /> 
      
    </table>
    <h4  style="text-align: center;">On vous envoie une confirmation par email dans un instant</h4>
    <p  style="text-align: center;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis voluptates explicabo quo omnis amet totam odit numquam, veniam officiis corrupti cupiditate ducimus dolore aperiam excepturi? Nam laboriosam eaque qui consequuntur!</p>
    </form>
          </div>
        </div>
        </div>
    <hr>
  </div>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-secondary">
    <div class="col-md-4 d-flex align-items-center">
      <a href="accueil.php" class="mb-3 me-2 mb-md-0 text-light text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><i class="fa fa-hand-o-right fa-3x" aria-hidden="true"></i></svg>
      </a>
      <span class="text-light">© 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="img/facebook.png"></img></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="img/instagram.png"></img></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="img/twitter.png"></img></svg></a></li>
    </ul>
  </footer>


  </div>


