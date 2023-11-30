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
        $loggedInUser = $_SESSION['idUser'];
        $userDao = new UserDAO();
        $userLoggedin = $userDao->getById($loggedInUser);
        $this->setViewParam('userLoggedin', $userLoggedin);
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

    public function save()
    {
        $hashtag = new Hashtag();
        $hashtag->setHashtag($_POST['hashtag']);
        $hashtagDAO = new HashtagDAO();
        $hashtagDAO->save($hashtag);

        $this->redirect('/hashtag/index');
    }

    public function deleteHashtag()
    {
        $this->auth();

        $hashtagId = (int)$_GET['idHashtag'];

        $hashtagDAO = new HashtagDAO();
        $hashtagDAO->drop($hashtagId);
        Sessao::gravaMensagem("Hashtag removida com sucesso.");

        $this->redirect('/hashtag/index');
    }

    public function editHashtag()
    {
        $hashtag = new Hashtag();
        $hashtag->setIdHashtag((int)$_GET['idHashtag']);
        $hashtag->setHashtag($_POST["hashtag"]);
        $hashtagDAO = new HashtagDAO();
        $hashtagDAO->alter($hashtag);
        $this->redirect('/hashtag/index');
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
