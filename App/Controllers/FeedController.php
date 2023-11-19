<?php

namespace App\Controllers;

use App\Models\DAO\UserDAO;
use App\Models\DAO\CategoryDAO;
use App\Lib\Sessao;

class FeedController extends Controller
{
    public function index()
    {
        $this->render('/project/index');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}

