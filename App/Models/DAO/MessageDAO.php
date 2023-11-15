<?php

namespace App\Models\DAO;

use App\Models\Entidades\Message;
use Exception;

class MessageDAO extends BaseDAO 
{
    public function getById(int $idMessage)
    {
        $result = $this->select("SELECT * FROM Messages WHERE idMessage = $idMessage");

        return $result->fetchObject(Message::class);
    }


    public function save(Message $message)
    {
        try {
            $senderId = $message->getSender()->getIdUser();
            $receiverId = $message->getReceiver()->getIdUser();
            $messageText = $message->getMessage();
            $sentAt = $message->getSentAt();

            $params = [
                ':senderId' => $senderId,
                ':receiverId' => $receiverId,
                ':message' => $messageText,
                ':sent_at' => $sentAt,
            ];

            return $this->insert('Messages', ':senderId, :receiverId, :message, :sent_at', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving message data. " . $e->getMessage(), 500);
        }
    }

    public function getMessagesByChat(int $sender, $receiver): array
    {
        try {
            $messages = [];
            $sql = "SELECT * FROM Messages WHERE (senderId = $sender AND receiverId=$receiver) OR (senderId = $receiver AND receiverId = $sender)";
            $result = $this->select($sql, []);
            
            while ($messageData = $result->fetch()) {
                $message = new Message();
                
                $message->setIdMessage($messageData['idMessage']);
                
                $senderId = $messageData['senderId'];
                
                $userDAO = new UserDAO();
                $sender = $userDAO->getById($senderId); 
                $message->setSender($sender);

                $receiverId = $messageData['receiverId'];
                
                $userDAO = new UserDAO();
                $receiver = $userDAO->getById($receiverId); 
                $message->setReceiver($receiver);
                
                $message->setMessage($messageData['message']);
                $message->setSentAt($messageData['sent_at']);
                
                array_push($messages, $message);
            }
    
            return $messages;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching messages for conversation. " . $e->getMessage(), 500);
        }
    }

    
    
    
}
