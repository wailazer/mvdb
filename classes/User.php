<?php

require_once 'core/init.php';


class User{
  private $_db,
          $_data, 
          $_id, $_username, $_pwd, $_firstName, $_lastName, $_email, // user table in db
          $_age, 
          $_userSession,
          $_loggedIn;


  function __construct($user = null){
    $this->_db = DB::getInstance();
    $this->_userSession = Config::get('session/session_name');
    if(!$user){
      if (Session::sessionExists($this->_userSession)) {
        $user =  Session::getSession($this->_userSession);
        // maybe check if user exists in db for more security
        if($this->findUser($user)){
          $this->_loggedIn = true;
        }else{
          //logout
        }
      } 
    }else{
        echo 'Finfing user data.......';
        $this->findUser($user);
        print_r($user);
    }
  }


  public function createUser($fields){
    if (!$this->_db->insert('user', $fields)) {
      throw new Exception("Error registering user");
    }
  }

  public function findUser($user = null){
    if ($user) {
      $field = (is_numeric($user)) ? 'id' : 'username';
      $data = $this->_db->get('user', array($field, '=', $user));
      if ($data->count()) {
        $this->_data = $data->first();
        // print_r($this->_data);
        return true;
      }
    }
  }

  public function login($username = null, $password = null){
    $userFound = $this->findUser($username);
    // print_r($this->_data);
    if ($userFound) {
      if ($this->getData()->pwd === $password) {
        $_SESSION['ID'] = $this->getData()->id;
        echo $_SESSION['ID'];
        Session::createSession($this->_userSession, $this->getData()->id);
        // print_r($this->_userSession);
          return true;
          // echo 'OK';
        //   code...
        }else {
          // echo "Not OK";
        }
      }
      return false;
  }

  public function updateProfile(){
    
  }

  public function logout(){
    Session::deletSession($this->_userSession);
  }


  public function getData(){
    return $this->_data;
  }

  public function loggedIn(){
    // echo 'returnning.....';
    // echo $this->_loggedIn.'Ä';
    return $this->_loggedIn;
  }

  public function profile(){
    $this->_db->getUserProfile('User');
  }
  
}
?>
