<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\AwardDAO;
use App\Models\DAO\ChallengeDAO;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\FileDAO;
use App\Models\DAO\HashtagChallengeDAO;
use App\Models\DAO\HashtagDAO;
use App\Models\DAO\HashtagProjectDAO;
use App\Models\DAO\ImageDAO;
use App\Models\DAO\LikeDAO;
use App\Models\DAO\NotificationDAO;
use App\Models\DAO\ProjectDAO;
use App\Models\DAO\SaveProjectDAO;
use App\Models\DAO\UserDAO;
use App\Models\DAO\WinnerDAO;
use App\Models\Entidades\Award;
use App\Models\Entidades\Challenge;
use App\Models\Entidades\Hashtag;
use App\Models\Entidades\Notification;
use App\Models\Entidades\User;
use App\Models\Entidades\Winner;

class ChallengeController extends Controller
{
    public function index()
    {
        try {
            $challengesDAO = new ChallengeDAO();
            $challenges = $challengesDAO->getAll();
            $challengesFinally = $challengesDAO->getChallengesAll();
            $hashtagChallengeDAO = new HashtagChallengeDAO();
            $awardsDAO = new AwardDAO();
            $usersDAO = new UserDAO();
            $user =  $usersDAO->getById($_SESSION['idUser']);
            $usersList = [];
            $awardsList = [];
            $hashtagsList = [];

            foreach ($challenges as $challenge) {
                $usersList[$challenge->getIdChallenge()] = $usersDAO->getUserByChallengeId($challenge->getIdChallenge());
                $awardsList[$challenge->getIdChallenge()] = $awardsDAO->getAwardsByChallengeId($challenge->getIdChallenge());
                $hashtagsList[$challenge->getIdChallenge()] = $hashtagChallengeDAO->getHashtagByChallengeId($challenge->getIdChallenge());
            }

            foreach ($challengesFinally as $challengeFinally) {
                $this->endChallenge($challengeFinally->getIdChallenge());
            }

            $loggedInUser = $_SESSION['idUser'];
            $userDao = new UserDAO();
            $userLoggedin = $userDao->getById($loggedInUser);
            $this->setViewParam('userLoggedin', $userLoggedin);
            $this->setViewParam('user', $user);
            $this->setViewParam('usersList', $usersList);
            $this->setViewParam('awardsList', $awardsList);
            $this->setViewParam('challenges', $challenges);
            $this->setViewParam('hashtagsList', $hashtagsList);
            $this->render('/challenge/index');
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function listChallenge($params)
    {
        try {
            $this->auth();

            $challengeDAO = new ChallengeDAO();
            $challenge = $challengeDAO->getById($params[0]);
            $projects = $challengeDAO->getByProject($params[0]);
            $awardDAO = new AwardDAO();
            $award = $awardDAO->getAwardsByChallengeId($params[0]);
            $challengeHashtag = $challengeDAO->getHashtagByChallengeId($params[0]);
            $challenge->setHashtag($challengeHashtag);

            $projectsToDisplay = [];

            foreach ($projects as $project) {
                $idProject = $project->getIdProject();

                $imageDAO = new ImageDAO();
                $images = $imageDAO->getImagesByProjectId($idProject);
                $project->setImages($images);

                $fileDAO = new FileDAO();
                $files = $fileDAO->getFilesByProjectId($idProject);
                $project->setFiles($files);

                $hashtagDAO = new HashtagProjectDAO();
                $hashtags = $hashtagDAO->getByProjectId($idProject);
                $project->setHashtags($hashtags);

                $likeDAO = new LikeDAO();
                $likeCount = $likeDAO->getLikeCountByArticleId($idProject);
                $project->setLikeCount($likeCount);

                $likeStatus = $likeDAO->getLikeStatus($idProject, $_SESSION['idUser']);
                $project->setLikeStatus($likeStatus);

                $saveDAO = new SaveProjectDAO();
                $saveStatus = $saveDAO->getSaveStatus($idProject, $_SESSION['idUser']);
                $project->setSaveStatus($saveStatus);

                $savedCount = $saveDAO->getSavedCountByArticleId($idProject);
                $project->setSaveCount($savedCount);

                $commentDAO = new CommentDAO();
                $comments = $commentDAO->getCommentsByProjectId($idProject);
                $project->setComments($comments);

                $commentCount = $commentDAO->getCommentCountByArticleId($idProject);
                $project->setCommentCount($commentCount);

                $projectsToDisplay[] = $project;
            }

            $loggedInUser = $_SESSION['idUser'];
            $userDAO = new UserDAO();
            $userLoggedin = $userDAO->getById($loggedInUser);

            $this->setViewParam('award', $award);
            $this->setViewParam('userLoggedin', $userLoggedin);
            $this->setViewParam('listProject', $projectsToDisplay);
            $this->setViewParam('challenge', $challenge);
            $this->setViewParam('user', $userDAO->getById($_SESSION['idUser']));
            $this->render('/challenge/listChallenge');
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }



    public function endChallenge($challengeId)
    {
        date_default_timezone_set('America/Sao_Paulo'); 
        $challengeDAO = new ChallengeDAO();
        $awardsDAO = new AwardDAO();
        $userDAO = new UserDAO();
    
        $challenge = $challengeDAO->getById($challengeId);
    
        if ($challenge && strtotime($challenge->getDeadline()) < time()) {
            $winner = $challengeDAO->getChallengeWinner($challengeId);
    
            if ($winner) {
                $idChallenge = $challenge->getIdChallenge();
                $existingUserId = $awardsDAO->checkAwardUserId($idChallenge);
    
                if ($existingUserId === null) {
                    $award = new Award();
                    $award->setIdUser($winner->getUserId());
                    $award->setIdChallenge($idChallenge);
    
                    $awardsDAO->updateUser($award);
                    $xpToAdd = $challenge->getReward();
                    $userDAO->updateXPAndLevel($winner->getUserId(), $xpToAdd);
    
                    $winners = new Winner();
                    $winners->setIdUser($winner->getUserId());
                    $winners->setIdChallenge($idChallenge);
                    $winnersDAO = new WinnerDAO();
                    $winnersDAO->save($winners);
    
                    $notification = new Notification();
                    $notification->setNotification('You just won a challenge! Check your profile for the new prize!');
                    $user = new User();
                    $user->setIdUser($winner->getUserId());
                    $notification->setUser($user);
                    $notificationDAO = new NotificationDAO();
                    $notificationDAO->save($notification);
                }
            }
        }
    }
    
  

    


    public function register()
    {
        $hashtagDAO = new HashtagDAO();
        $hashtags = $hashtagDAO->list();
        $this->setViewParam('hashtags', $hashtags);
        $loggedInUser = $_SESSION['idUser'];
        $userDao = new UserDAO();
        $userLoggedin = $userDao->getById($loggedInUser);
        $this->setViewParam('userLoggedin', $userLoggedin);
        $this->render('/challenge/register');
    }

    public function create()
    {
        $this->auth();
        $challengesDAO = new ChallengeDAO();
        $challenge = new Challenge();

        $challenge->setIdUser($_SESSION["idUser"]);
        $challenge->setGoal($_POST['goal']);
        $challenge->setName($_POST['name']);
        $challenge->setReward($_POST['reward']);
        $challenge->setDeadline($_POST['deadline']);
        $lastChallengeId = $challengesDAO->save($challenge);

        $challenge = $challengesDAO->getById($lastChallengeId);

        if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
            $objUpload = new Upload($_FILES['banner']);
            $bannerName = 'banner-' . $lastChallengeId;
            $objUpload->setName($bannerName);
            $dir = 'public/images/challenges';

            if ($objUpload->upload($dir)) {
                $challenge->setBanner($objUpload->getBasename());
                $challengesDAO->updateBanner($lastChallengeId, $objUpload->getBasename());
                Sessao::gravaMensagem("Banner do desafio atualizado com sucesso.");
            } else {
                Sessao::gravaErro("Erro ao enviar o novo banner do desafio.");
            }
        }
        $award = new Award();
        $award->setIdChallenge($lastChallengeId);
        $award->setDescription($_POST['description']);
        $award->setDate(date('Y-m-d H:i:s'));

        $awardsDAO = new AwardDAO();
        $lastAwardId = $awardsDAO->save($award);

        $award = $awardsDAO->getById($lastAwardId);

        if (isset($_FILES['imagePath']) && $_FILES['imagePath']['error'] === UPLOAD_ERR_OK) {
            $objUpload = new Upload($_FILES['imagePath']);
            $imagePathName = 'imagePath-' . $lastAwardId;
            $objUpload->setName($imagePathName);
            $dir = 'public/images/awards';

            if ($objUpload->upload($dir)) {
                $award->setImagePath($objUpload->getBasename());
                $awardsDAO->updateImagePath($lastAwardId, $objUpload->getBasename());
                Sessao::gravaMensagem("Caminho da imagem do prêmio atualizado com sucesso.");
            } else {
                Sessao::gravaErro("Erro ao enviar o novo caminho da imagem do prêmio.");
            }
        }
        $loggedInUser = $_SESSION['idUser'];
        $userDao = new UserDAO();
        $userLoggedin = $userDao->getById($loggedInUser);
        $this->setViewParam('userLoggedin', $userLoggedin);
        $hashtag = new Hashtag();
        $hashtag->setHashtag($_POST['hashtag']);
        $hashtagDAO = new HashtagDAO();
        $hashtagId = $hashtagDAO->save($hashtag);;
        $hashtagsChallengesDAO = new HashtagChallengeDAO();
        $hashtagsChallengesDAO->associateHashtagToChallenge($lastChallengeId, $hashtagId);
        $this->redirect('/challenge/index');
    }


    public function alter($params)
    {
        try {
            $this->auth();
            $challengeId = $params[0];

            $challengesDAO = new ChallengeDAO();
            $awardsDAO = new AwardDAO();
            $hashtagDAO = new HashtagDAO();

            $challenge = $challengesDAO->getById($challengeId);
            $award = $awardsDAO->getByChallengeId($challengeId);
            $hashtag = $hashtagDAO->getByChallengeId($challengeId);

            $this->setViewParam('challenge', $challenge);
            $this->setViewParam('award', $award);
            $this->setViewParam('hashtag', $hashtag);
            $loggedInUser = $_SESSION['idUser'];
            $userDao = new UserDAO();
            $userLoggedin = $userDao->getById($loggedInUser);
            $this->setViewParam('userLoggedin', $userLoggedin);
            $this->render('/challenge/alter');
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }


    public function updateChallenge($params)
    {
        $this->auth();
        $challengesDAO = new ChallengeDAO();
        $challenge = $challengesDAO->getById($params[0]);
        if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
            $objUpload = new Upload($_FILES['banner']);
            $bannerName = 'banner-' . $params[0];
            $objUpload->setName($bannerName);
            $dir = 'public/images/challenges';

            if ($objUpload->upload($dir)) {
                $challenge->setBanner($objUpload->getBasename());
                $challengesDAO->updateBanner($params[0], $objUpload->getBasename());
                Sessao::gravaMensagem("Banner do desafio atualizado com sucesso.");
            } else {
                Sessao::gravaErro("Erro ao enviar o novo banner do desafio.");
            }
        }
        $challenge = new Challenge();
        $challenge->setIdChallenge($params[0]);
        $challenge->setGoal($_POST['goal']);
        $challenge->setName($_POST['name']);
        $challenge->setReward($_POST['reward']);
        $challenge->setDeadline($_POST['deadline']);

        $challengesDAO->alterChallenge($challenge);
        $awardsDAO = new AwardDAO();
        $award = $awardsDAO->getByChallengeId($params[0]);

        if (isset($_FILES['imagePath']) && $_FILES['imagePath']['error'] === UPLOAD_ERR_OK) {
            $objUpload = new Upload($_FILES['imagePath']);
            $imagePathName = 'imagePath-' . $award->getIdAward();
            $objUpload->setName($imagePathName);
            $dir = 'public/images/awards';

            if ($objUpload->upload($dir)) {
                $award->setImagePath($objUpload->getBasename());
                $awardsDAO->updateImagePath($award->getIdAward(), $objUpload->getBasename());
                Sessao::gravaMensagem("Caminho da imagem do prêmio atualizado com sucesso.");
            } else {
                Sessao::gravaErro("Erro ao enviar o novo caminho da imagem do prêmio.");
            }
        }

        $award->setDescription($_POST['description']);
        $award->setDate(date('Y-m-d H:i:s'));
        $awardsDAO->alterAward($award);

        $hashtagDAO = new HashtagDAO();
        $hashtag = $hashtagDAO->getByChallengeId($params[0]);
        $hashtag->setHashtag($_POST['hashtag']);
        $hashtagDAO->alter($hashtag);

        $this->redirect('/challenge/index');
    }
}
