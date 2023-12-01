<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UserDAO;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('/home/index');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function initial()
    {
        $this->render('/project/index');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}

