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
            $conversationId = $message->getConversation()->getIdConversation();
            $senderId = $message->getSender()->getIdUser();
            $messageText = $message->getMessage();
            $sentAt = $message->getSentAt();

            $params = [
                ':conversationId' => $conversationId,
                ':senderId' => $senderId,
                ':message' => $messageText,
                ':sentAt' => $sentAt,
            ];

            return $this->insert('Messages', ':conversationId, :senderId, :message, :sentAt', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving message data. " . $e->getMessage(), 500);
        }
    }

    public function getMessagesByConversationId(int $conversationId): array
    {
        try {
            $messages = [];
            $result = $this->select("SELECT * FROM messages WHERE conversationId = :conversationId", [':conversationId' => $conversationId]);
            
            while ($messageData = $result->fetch()) {
                $message = new Message();
                
                $message->setIdMessage($messageData['idMessage']);
                
                $senderId = $messageData['senderId'];
                
                $userDAO = new UserDAO();
                $sender = $userDAO->getById($senderId); 
                $message->setSender($sender);
                
                $message->setConversation($messageData['conversationId']);
                $message->setMessage($messageData['message']);
                $message->setSentAt($messageData['sent_at']);
                
                $messages[] = $message;
            }
    
            return $messages;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching messages for conversation. " . $e->getMessage(), 500);
        }
    }
    
    
}
