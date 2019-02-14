<?php
require_once 'core/init.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php include("script/header.php") ?>

<main>
<?php
$user = new User();
if ($user->loggedIn()) {
    // echo ($user->getData()->username);
    ?>

<div id='profile-page'>
        <div id='profile-header'> <!--  row -->
            <!-- <div ></div> -->
            <div class='bottom'>
                <span id='full-name'><?php echo $user->getData()->firstName.' '.$user->getData()->lastName ?></span>
            </div>
        </div>

    <div id='details'>
        <div id='username'>
        <label for="username" id="username">Username: <?php echo $user->getData()->username; ?></label>
        </div><div id='email'>
        <label for="email" id="email">Email address: <?php echo $user->getData()->email ?></label>
        </div><div id='name'>
        <label for="name" id="name">Name: <?php echo $user->getData()->firstName ?></label>
        </div><div id='surname'>
        <label for="surname" id="surname">Surname: <?php echo $user->getData()->lastName?></label>
        </div><div id='age'>
        <label for="age" id="age">Age: <?php echo $user->getData()->age?></label>
        <button class='editbtn'  id='viewEdit' onclick="showOverlay()">Edit profile</button>
    </div>


    
    
    
</div>
    <div id="userEdit" style='display: none'>
        <div id='details'>
        <form action="">

            <div id='editUsername'>
                <label for="username" id="username">Username: <?php echo $user->getData()->username; ?> </label>
            </div><div id='editEmail'>
                Email address: <input for="email" id="editEmail" placeholder='<?php echo $user->getData()->email ?>'>
            </div><div id='editname'>
                Name: <input for="name" id="editname" placeholder='<?php echo $user->getData()->firstName ?>'>
            </div><div id='editsurname'>
                Surname: <input for="surname" id="editsurname" placeholder=<?php echo $user->getData()->lastName?>>
            </div><div id='editAge'>
             Age: <input for="age" id="editAge" placeholder= <?php echo $user->getData()->age?>>
            </div><div id='editPassword'>
                <button class='editPassbtn' type="button" id='openPassWindow'>click here to change your password</button>
            </div><div>
                <button class='editbtn' type="button" id='hideEdit' onclick="hideOverlay()">Abort</button>
                <button class='editbtn' id='submit' type="submit">Submit changes</button>
            </div>
            </form>
        </div>
    </div>

<!-- Password changeing div -->
<div id="changePassword" class="passwordWindow">
  <!-- Modal content -->
    <div id="password-container">
        <span class="close">&times;</span>
        <input type="password" name="oldPass" id="oldPwd" placeholder="old password">
        <input type="password" name="newPass" id="pwd" placeholder="new password">
        <input type="password" name="re-newPass" id="re-pwd" placeholder="re-enter password">
        <button id='submitPass' onclick='changePassword()'>submit</button>
    </div>
</div>
<!-- END password changeing div -->

</main>
<?php
}else{
    echo 'NOT LOGGED IN';
}

// $user->profile();
?>



<?php include("script/footer.php") ?>

</body>
</html>


<script type="text/javascript">
        function showOverlay(){

            document.getElementById("details").style.display = "none";
            document.getElementById("userEdit").style.display = "block";
        }
        function hideOverlay(){
            document.getElementById("details").style.display = "block";
            document.getElementById("userEdit").style.display = "none";
        }

        function changePasswordWindow(){

        }

        var passWindow = document.getElementById('changePassword');

        // Get the button that opens the modal
        var btn = document.getElementById("openPassWindow");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            passWindow.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            passWindow.style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == passWindow) {
            passWindow.style.display = "none";
        }
        }
    </script>