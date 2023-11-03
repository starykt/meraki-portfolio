<?php

namespace App\Controllers;

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
        $this->render('/project/feed');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}

