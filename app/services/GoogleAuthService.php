<?
/*
 The class GoogleAuthService contains all methods to interact 
 with the Google Auth SDK 
 v1.0 2020.
**/

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class GoogleAuthService{

    /**
     *  This function use the Google Client to get user info.
     *  @param identityUser: The user login info.
     *  @param auth: The Auth object for google service
     *  @return google_account_info Google account info
     */
    public function login($identityUser, $auth){
        // get secrets
        $secret = $this->getSecrets();

        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($secret->clientID);
        $client->setClientSecret($secret-$clientSecret);
        $client->setRedirectUri($secret-$redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $token = $client->fetchAccessTokenWithAuthCode($auth->code);
        $client->setAccessToken($auth->access_token);
        
        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // return google account
        return $google_account_info;
    }


    private function getSecrets(){

    }
}

// specify the path to your application credentials
putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/my/credentials.json');

// define the scopes for your API call
$scopes = ['https://www.googleapis.com/auth/drive.readonly'];

// create middleware
$middleware = ApplicationDefaultCredentials::getMiddleware($scopes);
$stack = HandlerStack::create();
$stack->push($middleware);

// create the HTTP client
$client = new Client([
  'handler' => $stack,
  'base_uri' => 'https://www.googleapis.com',
  'auth' => 'google_auth'  // authorize all requests
]);

// make the request
$response = $client->get('drive/v2/files');