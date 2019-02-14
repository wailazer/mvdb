<?php

class Movie{
    public $title,
            $originalTitle,
            $duration,
            $year,
            $FSK,
            $cover;
    private $_db,
            $_data;



public function __construct($movie = null){
  $this->_db = DB::getInstance();
}

// public function getDB(){
//   $this->_db = DB::getInstance();
// }
public function insertMovie($fields){
  // print_r($fields);
    if (!$this->_db->insert('movie', $fields)) {
      throw new Exception("Error adding this movie");
    }
  }

public function getMovie($class, $table, $field){
  if($this->_db->getClass('select *',$class, $table, $field)){
    // throw new Exception("Error getting movies", 1);
  }
}


            /**
             * Get the value of cover
             */ 
            // public function getCover()
            // {
            //             return $this->cover;
            // }
}





?>
