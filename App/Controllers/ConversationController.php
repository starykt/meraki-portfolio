<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ConversationDAO;
use App\Models\DAO\MessageDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Message;

class ConversationController extends Controller
{
  public function index($params)
  {
    $idUser_Recipient = $params[0];
    $this->auth();
    $userDao = new UserDAO();

    $messageDao = new MessageDAO();
    $chat = $messageDao->getMessagesByChat($idUser_Recipient, $_SESSION['idUser']);

    $userLogged = $userDao->getById($_SESSION['idUser']);
    $userRecipient = $userDao->getById($idUser_Recipient);
    self::setViewParam('userLogged', $userLogged);
    self::setViewParam('userRecipient', $userRecipient);
    self::setViewParam('chat', $chat);
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    // $conversationDAO = new ConversationDAO();
    // $conversations = $conversationDAO->listConversations($_SESSION['idUser']);
    // self::setViewParam('conversations', $conversations);

    $this->render('/conversation/index');
  }

  public function conversations()
  {
    $this->auth();
    $userDao = new UserDAO();

    $messageDao = new ConversationDAO();
    $conversations = $messageDao->getConversations($_SESSION['idUser']);

    $userLogged = $userDao->getById($_SESSION['idUser']);
    self::setViewParam('userLogged', $userLogged);
    self::setViewParam('conversations', $conversations);
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->render('/conversation/conversations');
  }

  public function chat($params)
  {
    $idUser_Recipient = $params[0];
    $this->auth();

    $messageDao = new MessageDAO();
    $chat = $messageDao->getMessagesByChat($idUser_Recipient, $_SESSION['idUser']);
    $chatArray = [];
    foreach ($chat as $msg) {
      array_push($chatArray, $msg->toArray());
    }

    header('Content-Type: application/json');
    echo json_encode($chatArray);
  }
  public function sendMessage()
  {
    $this->auth();
    $dados = json_decode(file_get_contents("php://input"));


    $senderId = $_SESSION['idUser'];
    $idRecipent = $dados->idUser_Recipent;
    $messageText = $dados->message;

    $userDao = new UserDAO();
    $sender = $userDao->getById($senderId);
    $receiver = $userDao->getById($idRecipent);

    // // $conversationId = $_POST['conversationId'];
    $message = new Message();
    $message->setMessage($messageText);
    $message->setSender($sender);
    $message->setReceiver($receiver);
    $message->setSentAt(date("Y-m-d H:m:s"));

    $messageDAO = new MessageDAO();
    $messageDAO->save($message);
  }
}
