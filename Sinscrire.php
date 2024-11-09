
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['tel'], $_REQUEST['adresse'])){
	
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);

    $contact = stripslashes($_REQUEST['tel']);
	$contact = mysqli_real_escape_string($conn, $contact);

    $adresse = stripslashes($_REQUEST['adresse']);
	$adresse = mysqli_real_escape_string($conn, $adresse);

	//si email existe deja
    $duplicata = mysqli_query($conn, "SELECT * FROM users WHERE  email = '$email'");
    if(mysqli_num_rows($duplicata)>0){
        echo "<script>alert('Email deja existé essayer un autre');</script>";
        header('Location: Sinscrire.php');
    }else{
        $query = "INSERT into `users` (username, email, password,Contact,Adresse) VALUES ('$username', '$email', '".hash('sha256', $password)."','$contact','$adresse')";
        // Exécuter la requête sur la base de données
        $res = mysqli_query($conn, $query);
        if($res){
        echo "<script>alert('Vous êtes inscrit avec succès');</script>";
        echo "<p>Cliquez ici pour vous <a href='Seconnecter.php'>connecter</a></p>";
                
        }
        else{
            echo "Error".$query."<br>".$conn->error;
        }
    }
    
}else{
    
    
?>

<html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/bootstrap.css">
 </head>
 <body>
 <div class="row align-items-center ">
      <div class="col-lg-6 text-center text-lg-start">
        <p class="col-lg-6 fs-4"><img src="img/83168-login-success.gif" alt=""></p>
      </div>
      <div class="col-md-12 mx-auto col-lg-6">
    <div class="container ">
         <form  method="POST" class="p-4 p-md-5 border rounded-3 bg-light mt-5">
             <div class="d-flex justify-content-center">
                 <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" name="username" required>
                <label for="floatingInput">Username</label>
             </div>
             <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="floatingInput" placeholder="___ __ ___ __" name="tel" required>
                <label for="floatingInput">Contact</label>
             </div>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" id="floatingPassword" placeholder="Adresse" name="adresse" required>
                 <label for="floatingPassword">Adresse</label>
             </div>
             <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                <label for="floatingInput">Email address</label>
             </div>
             <div class="form-floating mb-3">
                 <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                 <label for="floatingPassword">Password</label>
             </div>

             <div class="checkbox mb-3">
                 <label>
                     <input type="checkbox" value="remember-me"> Remember me
                 </label>
             </div>
             <a href="seConnecter.php"><button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">S'inscrire</button></a>
             <p class="mt-3 mb-3 ">Déjà inscrit? <a href="seConnecter.php">Connectez-vous ici</a></p>
             <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
         </form>
         <?php } ?>
   </div>
      </div>
 </div>
 </body>
 </html>
