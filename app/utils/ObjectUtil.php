<?php

class ObjectUtil{
    public static function array2Obj($arr)
    {
        return json_decode(json_encode($arr, FALSE));
    }
}

?>