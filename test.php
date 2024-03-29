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
</head>
<body>

<h2>Modal Example</h2>

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
