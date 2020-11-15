<?php

class AppError{

    public static function getErrorMessage($entity)
    {
        $errorMessage = "";
        foreach ($entity->getMessages() as $message) {
            $errorMessage = $errorMessage . " " . $message;
        }
        return $errorMessage;
    }

}


?>