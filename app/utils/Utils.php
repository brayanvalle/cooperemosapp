<?php

class Utils{

    public static function Error(): AppError{
        return new AppError();
    }

    public static function Hash(): Hash{
        return new Hash();
    }

    public static function Date(): Date{
        return new Date();
    }
}

?>


