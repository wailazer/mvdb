<?php
class Hash {
  //"2:40"
    public static function make($string, $salt = ''){
        return hash('sha256', $string, $salt);
    }

    public static function salt($length){
      return mcrypt_create_iv($length);
    }

    public static function unique(){
        // return
    }


}

?>
