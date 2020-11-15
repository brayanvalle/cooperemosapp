<?php

class UserService{

    public function createUser(IdentityUser $user){
        
        $identityUser = new IdentityUser();
        
        $user->save();
    }
}

?>