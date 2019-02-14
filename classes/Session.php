<?php
class Session{
  public static function sessionExists($session){
    return (isset($_SESSION[$session])) ? true : false;
  }

  public static function createSession($session, $value){
    return $_SESSION[$session] = $value;
  }

  public static function getSession($session) {
    return $_SESSION[$session];
  }

  public static function deletSession($session){
    if(self::sessionExists($session)){
      unset($_SESSION[$session]);
    }
  }
    public static function showOnce($session, $string = ''){
      if (self::sessionExists($session)) {
        $showSession = self::deletSession($session);
        return $showSession;
      } else {
        self::createSession($session, $string);
      }
    }


}
?>
