<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\HashtagDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Hashtag;

class HashtagController extends Controller
{
    public function index()
    {
        $this->auth();
        $hashtagDAO = new HashtagDAO(); 
        $hashtag = $hashtagDAO->list();
        self::setViewParam('listHashtag', $hashtag);
        Sessao::limpaMensagem();
        Sessao::limpaErro();
        $this->render('/hashtag/index');
        
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

