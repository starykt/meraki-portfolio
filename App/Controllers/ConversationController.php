<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ConversationDAO;
use App\Models\DAO\MessageDAO;
use App\Models\DAO\UserDAO;

class ConversationController extends Controller
{
  public function index($params)
  {
    $idUser_Recipient = $params[0];
    $this->auth();
    $userDao = new UserDAO();

    $userLogged = $userDao->getById($_SESSION['idUser']);
    $userRecipient = $userDao->getById($idUser_Recipient);
    self::setViewParam('userLogged', $userLogged);
    self::setViewParam('userRecipient', $userRecipient);
    
    // $conversationDAO = new ConversationDAO();
    // $conversations = $conversationDAO->listConversations($_SESSION['idUser']);
    // self::setViewParam('conversations', $conversations);

    $this->render('/conversation/index');
  }

  public function chat($conversationId)
  {
      $conversationId = intval($conversationId); // Converter para inteiro
  
      $messageDAO = new MessageDAO();
      $messages = $messageDAO->getMessagesByConversationId($conversationId);
      self::setViewParam('messages', $messages);
  
      // Agora você pode chamar o método getById passando um valor inteiro
      $conversationDAO = new ConversationDAO();
      $conversation = $conversationDAO->getById($conversationId);
  
      self::setViewParam('conversation', $conversation);
  
      $this->render('/conversation/chat');
  }
  
  

  
  public function sendMessage($params)
  {
    $this->auth();

    var_dump($params);
    

    $senderId = $_SESSION['idUser'];
    $idRecipent = $params[0];
    $messageText = "";
    if(count($params) > 2) {
      for($i = 1; $i < count($params); $i++) {
        $messageText.=$params[$i];
        if($i != count($params)-1) {
          $messageText .= "/";
        }
      }
    }else {
    $messageText = $params[1];
    }
    
    // // $conversationId = $_POST['conversationId'];

    // $messageDAO = new MessageDAO();
    // $messageDAO->save($conversationId, $senderId, $messageText);

    // Redirecione para a página de visualização da conversa
    echo "$idRecipent|$senderId|$messageText";
  }
}
