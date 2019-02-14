<?php

    require_once 'core/init.php';
    require_once 'script/dbms.php';

    class Genre {
      private $_db,
              $_data;

      function __construct()
      {
        $this->_db = DB::getInstance();
      }
      
      
      public function createGenre($fields){
        if (!$this->_db->insert('genre', $fields)) {
          // code...
          throw new Exception("Error inserting new Genre");
          
      }
    }
  
    public function findGenre($genre = null){
      if ($genre) {
        $field = (is_numeric($user)) ? : 'username';
        $data = $this->_db->get('Genre', array($field, '=', $genre));
        
        if ($data->count()) {
          $this->_data = $data->first();
          // print_r($this->_data);
          return true;
        }
      }
    }

    public function finAllGenre(){
      $data = $this->_db->getAll("genre");
      if ($data->count()){
        $this->_data = $data;
        print_r($this->_data);
      }


    }
    
    
    //END of class 
  }
  
  $getAllGenre = $_data->getAll();




    // print_r($line);
    // echo("<br>text");

    // $line.setHost('10.101.101.102');
    // $line.setDbName('moviedb_wiley');
    // $line.setUser('teilnehmer');
    // $line.setPwd('teilnehmer');






 ?>
