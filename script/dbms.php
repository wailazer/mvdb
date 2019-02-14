<?php
	$dbms = new PDO("mysql:host=localhost;dbname=moviedb", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


    function __construct()
    {
      // code...
    }

    // function dbSelect($table){
    //       global $dbms;
    //       $stmt = "SELECT * FROM $table;";
    //       $sql = $dbms->prepare($stmt);
    //       $sql->execute();  
    //           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    //               echo $row['cover'].'<br>';
    //       }  
    //    }  


    // class DB_functions
    // {
  
    //   function __construct()
    //   {
    //     // code...
    //   }
  
    //   public function dbSelect($table){
    //         global $dbms;
    //         $stmt = "SELECT * FROM $table;";
    //         $sql = $dbms->prepare($stmt);
    //         $sql->execute();  
    //             while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    //                 echo $row['id'];
    //         }  
    //      }  
  
    //   //class end
    // }

?>
