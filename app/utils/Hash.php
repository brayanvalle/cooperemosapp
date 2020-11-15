<?php

class Hash{
    
    public static function uuid(){
        return uniqid();
    }

    public static function encrypt($text){
        return sha1($password);
    }

    public static function compare($original , $encripted){
        return encrypt($original) == $encripted;
    }

}

?>