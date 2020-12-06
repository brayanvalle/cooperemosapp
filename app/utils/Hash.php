<?php

class Hash{
    
    public static function uuid(){
        return uniqid();
    }

    public static function encrypt($text){
        return sha1($text);
    }

    public static function compare($original , $encripted){
        return encrypt($original) == $encripted;
    }

}

?>