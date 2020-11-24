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

    public static function Http(): Http{
        return new Http();
    }

    public static function Functions(): Functions{
        return new Functions();
    }
}

?>


