<?php

class Date{

    public static function getDate($format = "Y-m-d H:i:s")
    {
        date_default_timezone_set('America/Bogota');
        return date($format);
    }
}
?>