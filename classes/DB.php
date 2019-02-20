<?php
class DB {
  private static $_instance = null;
  private $_pdo,
          $_query,
          $_error = false,
          $_results,
          $_count = 0;


  private function __construct(){
    try {
      $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') .
      ';dbname=' . Config::get('mysql/db') , Config::get('mysql/username'),
      Config::get('mysql/password'));
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
  
  public static function getInstance(){
    if (!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
      return self::$_instance;
  }

  public function query($sql, $params = array()){
    $this->_error = false;
    if ($this->_query = $this->_pdo->prepare($sql)) {
      $x=1;
      if (count($params)) {

        foreach ($params as $param) {
          $this->_query->bindValue($x, $param);
          $x++;
        }
      }
      
      if ($this->_query->execute()) {
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
        }else {
          $this->_error = true;
        }
      }
      return $this;
    }

  // Fetch Class 
  public function queryClass($sql, $params = array()){
    $this->_error = false;
    if ($this->_query = $this->_pdo->prepare($sql)) {
      if ($this->_query->execute()) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_CLASS, 'Movie');
        $this->_count = $this->_query->rowCount();
        }else {
          $this->_error = true;
        }
      }
      // print_r ($this);
      return $this;
    }
    //__________________



  private function action($action, $table, $where = array()){
    if (count($where)===3) {
      $operators = array('=', '<' ,'<=', '>', '>=', '!=');

      $field = $where[0];
      $operator = $where[1];
      $value = $where[2];

      if (in_array($operator, $operators)) {
        $sql= "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if (!$this->query($sql, array($value))->error()) {
          return $this;
        }
      }
    }
    return false;
  }

  public function getUserProfile($class){
    $query = $this->_pdo->query("select * from user where username = 'admin';");
    $query->setFetchMode(PDO::FETCH_CLASS, $class); 
    while ($row = $query->fetch()){
      echo '<pre>', print_r( $row ), '</pre>';
    }  
  }

  public function getClass($action, $class, $table, $field = array()){
    $stmt= "{$action} FROM {$table}";
    $query = $this->_pdo->query($stmt);
    $query->setFetchMode(PDO::FETCH_CLASS, $class);
      while ($row = $query->fetch()){
        $tmp_front = '<div class="flip-box-back">';
        echo '<div class="flip-box">
              <div class="flip-box-inner">';
        foreach($field as $item){
          // Temporary -- year and other details will be included later
          // if($item === 'year'){
          //   continue;
          // }
          if($item === 'cover'){
            
            $front = '<div class="flip-box-front"><img src="' . $row->$item .'" alt="">
            </div>';
            // </div>
            // </div>'
          }else{
            // '<div class="flip-box">
            // <div class="flip-box-inner">
            $tmp_front .= '<h4>' . $row->$item .'</h4>';
          }

        }
        $back = $tmp_front.'<button id="watch" onclick="">Watch now</button></div>';
        echo $front.$back.'</div></div>';
      }
    }
    
  public function get($table, $where){
    return $this->action('SELECT *', $table, $where);
  }

  public function getAll($table){
    return $this->action('SELECT *', $table);
  }


  // public function getAll($table){
  //   $sql= "SELECT * FROM {$table}";
  //   if (!$this->query($sql, array())->error()) {
  //     return $this;
  //   }
  // }

  public function delete($table, $where){
    return $this->action('DELETE', $table, $where);

  }
  public function insert($table, $fields = array()){
    $movie=array();
    $genre=array();
    foreach ($fields as $key => $value) {
      if ($key === 'name') {
        $genre[$key] =$value;
      }else {
        $movie[$key]= $value;
      }
      // return $movie;
    }
    
    $keys = array_keys($movie);
    $values = null;
    $x = 1;
    foreach($movie as $field){
      // echo 'in 2nd foreach!!!';
      $values .= '?';
      // print_r($field);
      if ($x < count($movie)) {
        $values .=', ';
        // print_r($fields);
      }
      $x++;
    }
    // print_r($field, $values);
    //if genre;
    if (!empty($genre)) {
      $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values};
      insert into movie_has_genre (movie_id, genre_id) select movie.id, genre.id from movie, genre where title='{$movie['title']}' and name = '{$genre['name']}';

      )" ;
       if (!$this->query($sql, $fields)->error()) {

        return true;
      }
    return false;

    }else{
      $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})" ;
      print_r($sql);
      //implode makes a string seperated by first argument
      // echo $sql;
      if (!$this->query($sql, $fields)->error()) {

        return true;
      }
    return false;
}
}

  public function update($table, $id, $fields){
    $set = "";
    $x = 1;

    foreach ($fields as $name => $value) {
      $set .= "{$name} = ?";
      if ($x < count($fields)) {
        $set .= ', ';
      }
      $x++;
    }
    $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
    if (!$this->query($sql, $fields)->error()) {
      return true;
    }
    return false;
  }

  public function results(){
    return $this->_results;
  }

  public function first(){
    return $this->results()[0];
  }

  public function error(){
    return $this->_error;
  }

  public function count(){
    return $this->_count;
  }

  // public function countRow($table){
  //   $stmt= "select count";
  //   $query = $this->_pdo->query($stmt);
  //   $query->setFetchMode(PDO::FETCH_CLASS, 'Movie');
  //     while ($row = $query->fetch()){
  //           echo $row->$field,'<br>';
  //     }
  //   }


}
?>