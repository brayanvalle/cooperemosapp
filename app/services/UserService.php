<?php

class UserService{

    public function createUser(IdentityUser $user){       
        
        $user->UserHash = Utils::Hash()::uuid();
        $user->PasswordHash = Utils::Hash()::encrypt($user->PasswordPlain);
        $user->IsActive = 1;
        $user->CreatedAt = Utils::Date()::getDate();
        
        $user->save();
    }
}

?>