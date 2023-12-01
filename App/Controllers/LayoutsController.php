<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\NotificationDAO;
use App\Models\Entidades\Notification;

class LayoutsController extends Controller
{

    public function __construct()
    {
        $this->menuNotifications($_SESSION['idUser']);
    }

    public function menuNotifications(int $idUser)
    {
        $notificationsDAO = new NotificationDAO();
        $notifications = $notificationsDAO->getNotificationsByUserId($idUser);
        self::setViewParam('notifications', $notifications);
        $this->render('/project/index');
    }
}

