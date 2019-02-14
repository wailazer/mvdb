<?php
/**
 *
 */
class Redirect {

  public static function toPage($locaton = null){
      header('location: '. $locaton);
      exit();
  }
  // function __construct(argument)
  // {
  // }
}



?>
