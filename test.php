<style>

.passwordWindow {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
#password-container {
    display: table;
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

#password-container > input, #submit{
    display: table;
    width: 400px;
    height: 50px;
    margin: 5px;
    padding-left: 10px;
    font-size: 20px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 24px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}


</style>
<?php
require_once 'core/init.php';
$user = new User();
// print_r($user->getData()->age);
// $user->updateProfile(array('agee' => 40));
// print_r($user->getData()->age);



if (Input::exists()) {
  
  // echo Input::get('email');
  $validate = new Validate();
  $validation = $validate->check($_POST, array(
      // 'newPass' => array(
      //     'min' => 8,
      //     'required' => true,
      // ),
      
      // 're-newPass' => array(
      // 'required' => true,
      // 'matches' => 'newPass'
      // ),
  ));
  // if ($validation->passed()) {
      $fields = array();
      if (!empty(Input::get('email')) ){
        $fields['email'] = Input::get('email');
      }
      if (!empty(Input::get('newPass'))){
        $fields['pwd']= Input::get('newPass');
      }
      if (!empty(Input::get('name'))){
        $fields['firstName']= Input::get('name');
      }
      if (!empty(Input::get('surname'))){
        $fields['lastName']= Input::get('surname');
      }
      if (!empty(Input::get('age'))){
        $fields['age']= Input::get('age');
      }
        // print_r($fields);
      try {
          $user->updateProfile($fields);
          header("Refresh:0");
      } catch ( Exception $e) {
          die($e->getMessage());
      }
  // }else {
  //     foreach ($validation->getErrors() as $error) {
  //       echo $error, '<br>';
  //     }
  // }
}

?>
</head>
<body>
<h2>MUpdate profile</h2>

<!-- Trigger/Open The Modal -->
<button id="openPassWindow">change password</button>

<!-- myModal   modal-->
<div id="changePassword" class="passwordWindow">
  <!-- Modal content -->
    <div id="password-container">
        <span class="close">&times;</span>
        <input type="password" name="oldPass" id="oldPwd" placeholder="old password">
        <input type="password" name="newPass" id="pwd" placeholder="new password">
        <input type="password" name="re-newPass" id="re-pwd" placeholder="re-enter password">
        <button id='submit' onclick='changePassword()'>submit</button>
    </div>
</div>

<div id="userEdit" style='display: table-cell'>
        <div id='details'>
        <form id="editForm" action="" method="post">
            <div id='editUsername'>
                <label for="username" id="username">Username: <?php echo $user->getData()->username; ?> </label>
            </div><div id='editEmail'>
                Email address: <input for="email" name="email" id="editEmail" placeholder='<?php echo $user->getData()->email ?>'>
            </div><div id='editname'>
                Name: <input for="name" name="name" id="editname" placeholder='<?php echo $user->getData()->firstName ?>'>
            </div><div id='editsurname'>
                Surname: <input for="surname" name="surname" id="editsurname" placeholder=<?php echo $user->getData()->lastName?>>
            </div><div id='editAge'>
             Age: <input for="age" name="age" id="editAge" placeholder= <?php echo $user->getData()->age?>>
            </div><div id='editPassword'>
                <button class='editPassbtn' type="button" id='openPassWindow'>click here to change your password</button>
            </div><div>
                <!-- <button class='editbtn' type="button" id='hideEdit' onclick="hideOverlay()">Abort</button> -->
                <button class='editbtn' id='submit' type="submit">Submit changes</button>
            </div>
            </form>
        </div>
    </div>

<script>
// Get the modal
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
