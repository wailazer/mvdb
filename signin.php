<?php
require_once 'core/init.php';

if (Input::exists()) {
  $validate = new Validate();
  $validation = $validate->check($_POST, array(
    'username' => array('required' => true),
    'password' => array('required' => true)
  ));
  
  if ($validation->passed()) {
    $user = new User();
    $login = $user->login(Input::get('username'), Input::get('password'));
    // echo Input::get('username').' AND '. Input::get('password');
    if ($login) {
      Redirect::toPage('index.php');
    }else {
      echo('Wrong username or password!');
    }

  }else {
    foreach ($validation->getErrors() as $error) {
      echo $error, '<br>';
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
    </head>
    <body>
      <?php include("script/header.php") ?>

    <div id="back-div">
        <div id="inner-back-div">




<div id="signin">
  <form class="login" id="signin-form" action="" method="post">
   
    <div id="top-row" class="field">
      <!-- <label for="username">Username</label> -->
      <input type="text" name="username" id="username" placeholder="username/email address">
    </div>

    <div id="middle-row" class="field">
      <!-- <label for="password">Password</label> -->
      <input type="password" name="password" id="password" placeholder="Password">
    </div>
    
    <div id="button-row">
      <input type="submit"  value="Sign in" id="signin-btn">
    </div> 

    <div id="regester">
        <h4>Dont have an account yet? <br><a href="register.php">Register</a></h4>
    </div>
  </form>
</div>

        <!-- <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies.html">Movies</a></li>
                    <li><a href="account.html">Account</a></li>
                    <li><a href="">Sign in</a></li>
                </ul>
    		</nav> -->
            <main>
            </main>
          </div>  <!--  end of inner-back-div-->
      </div>        <!--  end of back-div-->

            <footer>
                <?php include("script/footer.php") ?>
            </footer>
    </body>
</html>


