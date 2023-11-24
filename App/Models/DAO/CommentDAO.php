<?php

namespace App\Models\DAO;

use App\Models\Entidades\Comment;
use App\Models\Entidades\User;
use Exception;

class CommentDAO extends BaseDAO 
{


    public function list()
    {
        $resultado = $this->select("SELECT * FROM Comments");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function getCommentCountByArticleId($idProject)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as CommentCount FROM Comments WHERE idProject = " . $idProject
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet) {
            return $dataSet['CommentCount'];
        }
    
        return 0;
    }
    
    public function save(Comment $comment)
    {
        try {
            $text = $comment->getText();
            $dateCreate = $comment->getDateCreate()->format('Y-m-d H:i:s');
            $idUser = $comment->getUser()->getIdUser();
            $idProject = $comment->getProject()->getIdProject();
            
            $params = [
                ':text' => $text,
                ':dateCreate' => $dateCreate,
                ':idUser' => $idUser,
                ':idProject' => $idProject
            ];
    
            return $this->insert(
                'Comments',
                ":text, :dateCreate, :idUser, :idProject",
                $params
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e->getMessage(), 500);
        }
    }
    

    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT c.idComment, c.text, c.idUser, u.nickname as user
            FROM Comments as c
            INNER JOIN Users as u ON c.idUser = u.idUser
            WHERE c.idComment = $id"
        );
    
        $dataSetComment = $resultado->fetch();
    
        if ($dataSetComment) {
            $Comment = new Comment();
            $Comment->setIdComment($dataSetComment['idComment']);
            $Comment->setText($dataSetComment['text']);
    
            $user = new User();
            $user->setIdUser($dataSetComment['idUser']);
            $user->setNickname($dataSetComment['user']);
  
            $Comment->setUser($user);
    
            return $Comment;
        }
    
        return false;
    }
    
    public function getCommentsByProjectId($idProject)
    {
        $result = $this->select("SELECT * FROM Comments WHERE idProject = $idProject");
        $comments = [];
        
        while ($commentData = $result->fetch()) {
            $comment = new Comment();
            $comment->setIdComment($commentData['idComment']);
            $comment->setText($commentData['text']);
            $comment->setDateCreate(new \DateTime($commentData['dateCreate']));
        
            $userDAO = new UserDAO();
            $user = $userDAO->getById($commentData['idUser']); 
            $comment->setUser($user);
        
            $comments[] = $comment;
        }
        
        return $comments;
    }
    
    

    public function edit(Comment $Comment)
    {
            try {
                $idComment = $Comment->getIdComment();
                $text = $Comment->getText();
        
                $params = [
                    ':idComment' => $idComment,
                    ':text' => $text
                ];
        
                return $this->update('Comments', "text = :text", $params, "idComment = :idComment");
            } catch (\Exception $e) {
                throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
            }
       

    }
    
    public function getCommentCountByUserId($idUser)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as commentCount FROM Comments 
            INNER JOIN Projects ON Comments.idProject = Projects.idProject 
            WHERE Projects.idUser = $idUser"
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet) {
            return $dataSet['commentCount'];
        }
    
        return 0; 
    }
    
    public function drop(int $idComment)
    {
        try {
            return $this->delete('Comments', "idComment = $idComment");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a comentario. " . $e->getMessage(), 500);
        }
    }
}
    
    
    
