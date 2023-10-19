<?php

namespace App\Models\DAO;

use App\Models\Entidades\Conversation;
use Exception;

class ConversationDAO extends BaseDAO 
{
    public function getById(int $idConversation)
    {
        $result = $this->select("SELECT * FROM Conversations WHERE idConversation = $idConversation");

        return $result->fetchObject(Conversation::class);
    }

    public function save(Conversation $conversation)
    {
        try {
            $user1Id = $conversation->getUser1()->getIdUser();
            $user2Id = $conversation->getUser2()->getIdUser();
            $createdAt = $conversation->getCreatedAt();

            $params = [
                ':user1Id' => $user1Id,
                ':user2Id' => $user2Id,
                ':createdAt' => $createdAt,
            ];

            return $this->insert('Conversations', ':user1Id, :user2Id, :createdAt', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving conversation data. " . $e->getMessage(), 500);
        }
    }

    public function listConversations(int $idUser): array
    {
        try {
            $conversations = [];
    
            $result = $this->select("SELECT * FROM conversations WHERE user1Id = " . (int)$idUser . " OR user2Id = " . (int)$idUser);
    
            while ($conversationData = $result->fetch()) {
                $conversation = new Conversation();
                $conversation->setIdConversation($conversationData['idConversation']);
    
                $user1Id = $conversationData['user1Id'];
                $userDAO = new UserDAO();
                $user1 = $userDAO->getById($user1Id);
                $conversation->setUser1($user1);
    
                $user2Id = $conversationData['user2Id'];
                $user2 = $userDAO->getById($user2Id);
                $conversation->setUser2($user2);
    
                $conversation->setCreatedAt($conversationData['created_at']);
                $conversations[] = $conversation;
            }
    
            return $conversations;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching conversations. " . $e->getMessage(), 500);
        }
    }
    
    

}
