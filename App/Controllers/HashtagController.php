<?php

namespace App\Controllers;

use App\Lib\Sessao;

class HashtagController extends Controller
{
    public function index()
    {
        $this->render('/hashtag/index');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function register()
    {
        $this->render('/hashtag/resgiter');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function alter()
    {
        $this->render('/hashtag/alter');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function delete()
    {
        $this->render('/hashtag/delete');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}

