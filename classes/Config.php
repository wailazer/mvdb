<?php
class Config {
  public static function get($path = null) {
    if($path){
      $config = $GLOBALS['config'];
      $path = explode('/', $path);

      foreach ($path as $bit) {
        if (isset($config[$bit])) {
          // code...
          $config = $config[$bit];
        }
      }
      // print_r($path);
      return $config;
    }
    return false;
  }
}

 ?>
