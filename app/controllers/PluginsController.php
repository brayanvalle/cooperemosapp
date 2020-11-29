<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PluginsController extends ControllerBase
{
    public function indexAction(){
        
    }


    public function gameAction(){
        $games = PluginGamePost::find();
        $numberPage = 1;
        $paginator = new Paginator([
            'data' => $games,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function gameviewAction($gameId){
        $game = PluginGamePost::findFirst($gameId);

        $gameInteractions = PluginGamePostInteraction::find('PluginGameId = ' . $gameId);

        $this->tag->setDefault("GAME_ID", $game->Id);

        $this->view->game = $game;

        $numberPage = 1;
        $paginator = new Paginator([
            'data' => $gameInteractions,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();

    }

    public function gameParticipateAction($gameId){

        $file_location = "";
        try{
            $data = $_POST;

            $user = $this->getSession();

            if($data['Body'] == ""){
                throw new Error('Respuesta es requerido');
            }

            if($_FILES['file']['name'] != "")
            {
                $file_response = Utils::Functions()->SaveFile($_FILES , "games/");        
                if(!$file_response->success){                    
                    throw new Error('Error saving file: ' . $file_response->message);
                }
                if($file_response->location != "")
                    $file_location = $file_response->location;
            }


            $userInteraction = new PluginGamePostInteraction();

            $userInteraction->IdentityUserId = $user['UserId'];
            $userInteraction->PluginGameId = $gameId;
            $userInteraction->Body = $data['Body'];
            $userInteraction->Date = Utils::Date()->getDate();

            

            $userInteraction->PluginGamePost->ActiveUsers = $userInteraction->PluginGamePost->ActiveUsers + 1;

            if(!$userInteraction->save()){
                $error = Utilities::GetErrorMessage($userInteraction);
                throw new Error($error);
            }          

            return $this->Ok($userInteraction);
            
        }catch(PDOException $e){
                return $this->Error("Ya has participado en este juego.");
        }catch(Error $e){
            return $this->Error($e->getMessage());
        }
    }

    public function mymobilityAction(){
        
        $user = $this->GetSessionUser();
        $pluginService = new PluginService();

        $mobilityReport = $pluginService->getUserMobilityReport($user['ExternalUser']->Id);

        $this->view->mobilityReport = $mobilityReport;
    }
}
