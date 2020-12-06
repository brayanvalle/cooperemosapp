
<?php

class Functions{


    public static function getDate($format = "Y-m-d H:i:s")
    {
        date_default_timezone_set('America/Bogota');
        return date($format);
    }


    public static function folder_exist($folder)
    {
        // Get canonicalized absolute pathname
        $path = realpath($folder);

        // If it exist, check if it's a directory
        return ($path !== false AND is_dir($path)) ? $path : false;
    }


    /**
     * Return [success , location]
     *
     */ 

    public static function SaveFile($file , $target, $name='file')
    {
        json_decode(json_encode($arr, FALSE));

        $response = [
            'success' => false,
            'location' => null,
            'message' => ''
        ];

        $response = json_decode(json_encode($response, FALSE));
        try{
            $complete_target = _APP_LOCAL_PATH_;
            //$complete_target = "/var/www/html/nicooperationappv2/";
            $relative_target = "public/media/" . $target;
            if(Functions::folder_exist($complete_target . $relative_target)){
                
                $relative_target = $relative_target . Functions::GetDate("YmdHis"). "_" .basename( $file[$name]['name']);       
            
                if(move_uploaded_file($file[$name]['tmp_name'],$complete_target. $relative_target)){
                    $response->location = _APP_URL.''.$relative_target;
                    $response->success = true;
                }  
            }
        }catch(Exception $e){
            $response->message = $e;
        }          
        
        return $response;
    }
}
?>