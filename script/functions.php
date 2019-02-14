<?php
  require_once("script/dbms.php");



function getAll($table){
  global $dbms;
  if($table === 'genre'){
	  $stmt = "SELECT * FROM $table;";
	  $sql = $dbms->query($stmt);
	  while ($row = $sql->fetchall(PDO::FETCH_KEY_PAIR)) {
		  $result = $row;
		}
		return $result;
	}else if ($table ==='movie'){
		$stmt = "SELECT title, cover, FSK FROM $table;";
		$sql = $dbms->prepare($stmt);
		$sql->execute();  
		while ($row = $sql->fetchall(PDO::FETCH_ASSOC)){;
		// $title = $row['title'];
		// echo $row['title'];
		// echo json_encode($row);
	}
	}
  }
  //else


?>
