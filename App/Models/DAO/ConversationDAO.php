<?php

namespace App\Models\DAO;

use App\Models\Entidades\Conversation;
use App\Models\Entidades\Message;
use Exception;

class ConversationDAO extends BaseDAO
{
    public function getById(int $idConversation)
    {
        $result = $this->select("SELECT * FROM Conversations WHERE idConversation = $idConversation");

        return $result->fetchObject(Conversation::class);
    }

    public function getConversations($userId)
    {
        try {
            $sql = "
            SELECT 
    subquery.userId,
    subquery.last_sent_at,
    Messages.message
FROM (
    SELECT
        CASE
            WHEN senderId <> $userId THEN senderId
            ELSE receiverId
        END as userId,
        MAX(sent_at) as last_sent_at
    FROM Messages
    WHERE senderId = $userId OR receiverId = $userId
    GROUP BY
        CASE
            WHEN senderId <> $userId THEN senderId
            ELSE receiverId
        END
) AS subquery
JOIN Messages ON (
    (subquery.userId = Messages.senderId AND $userId = Messages.receiverId)
    OR
    (subquery.userId = Messages.receiverId AND $userId = Messages.senderId)
) AND subquery.last_sent_at = Messages.sent_at
ORDER BY subquery.last_sent_at DESC;
     
";

            $result = $this->select($sql);

            $conversations = [];

            foreach ($result as $row) {
                $userDAO = new UserDAO();
                $user = $userDAO->getById($row['userId']);
                $conversations[] = [
                    'user' => $user,
                    'lastSentAt' => $row['last_sent_at'],
                    'lastMessage' => $row['message'],
                ];
            }

            return $conversations;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao obter as conversas do usuário. " . $e->getMessage(), 500);
        }
    }


    public function getLastMessage($userId1, $userId2)
    {
        try {
            $sql = "
            SELECT *
            FROM Messages
            WHERE (senderId = $userId1 AND receiverId = $userId2)
               OR (senderId = $userId2 AND receiverId = $userId1)
            ORDER BY sent_at DESC
            LIMIT 1
        ";

            $result = $this->select($sql);


            if (!$result) {
                return null;
            }

            $lastMessage = new Message();
            $lastMessage->setIdMessage($result[0]['id']);
            $lastMessage->setSender($result[0]['senderId']);
            $lastMessage->setReceiver($result[0]['receiverId']);
            $lastMessage->setMessage($result[0]['message']);
            $lastMessage->setSentAt($result[0]['sent_at']);

            return $lastMessage;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao obter a última mensagem. " . $e->getMessage(), 500);
        }
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
