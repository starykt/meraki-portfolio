<?php

namespace App\Controllers;

use App\Models\DAO\UserDAO;
use App\Models\DAO\CategoryDAO;
use App\Lib\Sessao;

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
        $this->render('/home/initial');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}

