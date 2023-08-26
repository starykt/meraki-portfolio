<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\HashtagDAO;
use App\Models\Entidades\Hashtag;

class HashtagController extends Controller
{
    public function index()
    {
        $this->render('/hashtag/index');
        $this->auth();
        $hashtagDAO = new HashtagDAO();
        self::setViewParam('listHashtag', $hashtagDAO->listar());
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function register()
    {
        $this->render('/hashtag/register');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function save(){
        $hashtag = new Hashtag();
        $hashtag->setHashtag($_POST['hashtag']);
        $hashtagDAO = new HashtagDAO();
        $hashtagDAO->save($hashtag);
        
        $this->redirect('/hashtag/index'); 
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

