<?php

namespace App\Models\DAO;

use App\Models\Entidades\Notification;
use Exception;
class NotificationDAO extends BaseDAO 
{
  public function list()
  {
      $result = $this->select("SELECT * FROM Notifications");
  
      $dataSet = $result->fetchAll();
      $listNotifications = [];
  
      if ($dataSet) {
          foreach ($dataSet as $data) {
              $notification = new Notification();
              $notification->setIdNotification($data['idNotification']);
              
              $userDAO = new UserDAO();
              $user = $userDAO->getById($data['idUser']);
              $notification->setUser($user);
              
              
              $notification->setNotification($data['notification']);
              $listNotifications[] = $notification;
          }
      }
  
      return $listNotifications;
  }
  
  public function getById(int $idNotification)
  {
      $result = $this->select("SELECT * FROM Notifications WHERE idNotification = $idNotification");
      $notificationData = $result->fetch();
  
      if ($notificationData) {
          $notification = new Notification();
          $notification->setIdNotification($notificationData['idNotification']);
          $userDAO = new UserDAO();
          $user = $userDAO->getById($notificationData['idUser']);
          $notification->setUser($user);
          
          $notification->setNotification($notificationData['notification']);
          return $notification;
      }
  
      return null;
  }
  
  public function save(Notification $notification)
  {
      try {
          $idUser = $notification->getUser()->getIdUser();
          $notificationText = $notification->getNotification();
  
          $params = [
              ':idUser' => $idUser,
              ':notification' => $notificationText,
          ];
  
          return $this->insert('Notifications', ':idUser, :notification', $params);
      } catch (\Exception $e) {
          throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
      }
  }
  
  }