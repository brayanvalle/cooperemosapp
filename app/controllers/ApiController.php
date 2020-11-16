<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
class ApiController extends Controller{

    function initialize() {
        $this->data = [
            'data' => 1
        ];
    }

    private function Response($status , $header , $body){
        $response=new Response();
        $response->setStatusCode($status, $header);
        $response->setJsonContent($body);
        return $response;
    }

    private function Ok($message){
        return $this->Response(200 , 'Ok' , $message);
        
    }

    private function Error($message){
        return $this->Response(400 , 'Error' , $message);
    }


    public function createUserAction(){
        
        $user = new IdentityUser();

        $user->Email = "brayan_valle82142@elpoli.edu.co";
        $user->PasswordPlain = "admin";
        $user->ExternalUserProfileId = "abc1234";
        $user->IsInternal = 1;
        $user->IdentityRoleId = 1;

        $userService = new UserService();

        $userService->createUser($user);

        return $this->Ok("all good");
    }


    public function createUUIDAction(){

        return $this->Ok(Utils::Hash()->uuid());
    }
    
    public function createPostEntryAction(){        
        try{
            $request = $this->request->getJsonRawBody();

            $postEntry = new PostEntry();
            $postEntry->Title = $request->title;    
            $postEntry->Body = $request->body;
            $postEntry->MainBannerImageUrl = $request->mainBannerImageUrl;
            $postEntry->IsPublished = $request->isPublished ? 1 : 0;   
            
            $postEntryService = new PostEntryService();    
            $postEntryService->createPostEntry($postEntry);

            return $this->Ok("Created Ok");
        }catch(Error $e){
            return $this->Error($e);
        }
       
        
       
    }


}
?>