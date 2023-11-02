<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ConversationDAO;
use App\Models\DAO\MessageDAO;

class ConversationController extends Controller
{
  public function index()
  {
    $this->auth();

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
  
  


  public function sendMessage()
  {
    $this->auth();

    $messageText = $_POST['message'];
    $conversationId = $_POST['conversationId'];
    $senderId = $_SESSION['idUser'];

    $messageDAO = new MessageDAO();
    $messageDAO->save($conversationId, $senderId, $messageText);

    // Redirecione para a página de visualização da conversa
    $this->redirect('/conversation/view/' . $conversationId);
  }
}
