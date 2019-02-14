<?php
require_once 'core/init.php';
// require_once 'script/dbms.php';

?>
   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title>Media Library</title>
       <link rel="stylesheet" href="css/main.css">

     </head>
     <body>

<?php include("script/header.php") ?>

      <div class="clear"></div>

      <div id="hero-image">
        <div id="inner/hero/image" class="inner">

        <style>
          
            
        #hero-image {
            background-image: url("images/index.jpg");
            background-color: #cccccc;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
          }
        </style>
        <div id="hero-text">
          <h3>Welcome to your very own <br>Media Library</h3>
          <?php
          
          $user = new User();
          if ($user->loggedIn()) {
          ?>
           <script type"text/javascript">
           if (!sessionStorage.getItem("visit")){
                      window.alert("Sign in success!<br>Thank you!"); 
                    } 
                    sessionStorage.setItem("visit", "1");
                    </script>
          <?php
          }else{
            echo 'nope!';
          }
          // $newMov = new Movie();
          // $newMov->getMovie('movie', 'title');
          
          ?>

        </div>

      </div>
      </div>


      <div class="clear"></div>

      <footer>
        <?php include("script/footer.php") ?>
      </footer>


     </body>
   </html>

