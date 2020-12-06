<?php

class UserService{

    public function createUser(IdentityUser $user){       
        
        $user->UserHashId = Utils::Hash()::uuid();
        $user->PasswordHash = Utils::Hash()::encrypt($user->PasswordPlain);
        $user->IsActive = 1;
        $user->CreatedAt = Utils::Date()::getDate();

        $userExists = IdentityUser::findFirst('Email = "' . $user->Email . '"');

        if($userExists !== null){
            throw new Error("User already exists");
        }

        if(!$user->save()){
            throw new Error(Utils::Error()->getErrorMessage($user));
        }
    }

    public function getExternaluserInfo($externalUserProfileId){
                
    }
}

?>