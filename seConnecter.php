
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
<?php
require ('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
    if($username=='Admin' OR $password == 'admin'){
        $dd = mysqli_fetch_array($result);
        $_SESSION['username'] = $username;
        $_SESSION['id_users']=$dd['id_users'];
        header('Location: client.php');
    }else{
        if($rows>0){
            $dd = mysqli_fetch_array($result);
            $_SESSION['username'] = $username;
            $_SESSION['id_users']=$dd['id_users'];
            header("Location: accueil.php");
            
        }else{
            $error= "Le nom d'utilisateur ou le mot de passe est incorrect.";
            header("Location: seConnecter.php?error=$error");
            echo "error".$rows."row".$conn->error;
        }
    }
	
}

?>

<div class="container ">
    <div class="row align-items-center ">
      <div class="col-lg-6 text-center text-lg-start">
        <p class="col-lg-6 fs-4"><img src="img/83168-login-success.gif" alt=""></p>
      </div>
      <div class="col-md-12 mx-auto col-lg-6">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" >
            <?php
                if(isset($_GET['error'])){
                    ?>
                        <div class="alret  text-danger" role="alert">
                            <?php
                                echo htmlspecialchars($_GET['error'])
                            ?>
                        </div>
                    <?php
                }
            ?>
    
        <div class="d-flex justify-content-center">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        </div>
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "password"required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
          <p class="box-register mt-3">Vous êtes nouveau ici? <a href="Sinscrire.php">S'inscrire</a></p>
          
          <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>













<!-- 
    <div class="d-flex justify-content-center" >
    <div class="row">
        <div class="col-lg-6 ">
            
        </div>
        <div class="col-lg-6 ">

            <div class="container-md  mt-5">
                    <form  method="POST">
                        <div class="d-flex justify-content-center">
                            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" name="username" required>
                            <label for="floatingInput">Username</label>
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
                            <button class="btn btn-primary w-100" type="submit" name="submit">Se connecter</button>
                            <div>
                                <p class="box-register">Vous êtes nouveau ici? <a href="Sinscrire.php">S'inscrire</a></p>
                                <?php if (! empty($message)) { ?>
                                <p class="errorMessage"><?php echo $message; ?></p>
                                <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
                            </div>
                    </form>
                    <?php } ?>
            </div>
        </div>
    </div>
</div> -->
   <script src="js/bootstrap.js"></script>
</body>
</html>