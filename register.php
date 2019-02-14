 <?php
require_once 'core/init.php';

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array(
          'required' => true,
          'min' => 2,
          'max' => 20,
          'unique' => 'user'
      ),
      'password' => array(
        'required' => true,
        'min' => 8,
      ),
      'password2' => array(
        'required' => true,
        'matches' => 'password'

      ),
      'firstName' => array(
        'required' => true,
        'min' => 2,
        'max' => 30,
      ),
      'lastName' => array(
        'required' => true,
        'min' => 2,
        'max' => 30,
      ),
      'email' => array(
        // 'required' => false,
        'min' => 7,
        // 'unique' => 'user'
      ),
    ));
    if ($validation->passed()) {
        $user = new User();
        try {
          $user->createUser(array(
            'username' => Input::get("username"),
            'pwd' => Input::get('password'),
            'email' => Input::get('email'),
            'firstName' => Input::get('firstName'),
            'lastName' => Input::get('lastName'),
            // 'age' => Input::get('age'),
            'isAdmin' => '0'
          ));

          ' <script type="text/javascript">
                  alert("Registration successfull  Thank you")
                 </script>';
          Redirect::toPage('signin.php');

        } catch (Exception $e) {
          die($e->getMessage());
        }

        // echo "Passed";
        //"2:12"
    } else {
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

    <div id="back-reg-div">
      <div id="inner-reg-div">


<!-- Register -->
<main>
    <div id="left">
      <div id="happy-reg">
        <img src="images/happy-reg.jpg" alt="">
        <!-- <h3>happy to see you here ;)</h3> -->
      </div>
    </div>

    <div id="right"> 
      <form id="reg-form" action="" method="post">
        <div id="reg-top" class="field">
          <!-- <label for="username">Username</label> -->
          <input id="reg-user" type="text" name="username" placeholder="chose a username" value="<?php echo Input::get('username'); ?>" autocomplete="off">
        </div>
        
        <div id="reg-2nd" class="field">
          <!-- <label for="password">Password</label> -->
          <input id="reg-pass" type="password" name="password"  placeholder="chose a password" value="">
        </div>
        
        <div id="reg-3ed" class="field">
            <!-- <label for="password2">Re-enter password</label> -->
            <input type="password" name="password2"  placeholder="repeat chossen password " value="">
          </div>

          <div id="reg-4th" class="field">
            <!-- <label for="firstName">First name</label> -->
            <input type="text" name="firstName" id="firstName" placeholder="first name" value="<?php echo Input::get('firstName'); ?>">
          </div>
          
          
          <div id="reg-5th" class="field">
            <!-- <label for="lastName">Last name</label> -->
            <input type="text" name="lastName" id="lastName" placeholder="last name" value="<?php echo Input::get('lastName'); ?>">
          </div>
          
          
          <div id="reg-6th" class="field">
            <!-- <label for="email">Email addresse</label> -->
            <input type="email" name="email" id="email" placeholder="email address" value="<?php echo Input::get('email'); ?>">
          </div>
          
        </div>
          <div id="sbmt">
            <input type="submit" id="reg-submit" name="register" value="Register">
          </div>
        </form>
        
  </main>
  </div>
</div>        <!--  end of back-div-->
<!-- end Register -->


            <footer>
                <?php include("script/footer.php") ?>
            </footer>
    </body>
</html>
