<?php

 ?>


 <div id="foot-bar">
   <div id="copyright">
     <h4><a href="images/wile_e.png">&copy wile e coyote</a></h4>


   </div>
 </div>


<?php

  function wile_e(){
    $view = <<<EOF
       <div id="back-div">
         <div id="inner-back-div">

       <style>
         #back-div{
           display: none;
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

           background-image: url("images/wile_e.png");

          #inner-back-div{
           width: 400px;
           height: 600px;
           float: left;
           background-color: white;
           opacity: .5;
           margin: 100px 200px;
           /* font-weight: bold; */
         }
       </style>
     </div>   end of inner-back-div-->
EOF;
  return $view;

   }
       ?>

       </div>
