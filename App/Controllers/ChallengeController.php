<?php
// ChallengeController.php
namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\AwardDAO;
use App\Models\DAO\ChallengeDAO;
use App\Models\DAO\ChallengesDAO;
use App\Models\DAO\HashtagChallengeDAO;
use App\Models\DAO\HashtagDAO;
use App\Models\DAO\HashtagsChallengeDAO;
use App\Models\DAO\HashtagsChallengesDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Award;
use App\Models\Entidades\Challenge;
use App\Models\Entidades\Hashtag;

class ChallengeController extends Controller
{
    public function index()
    {
        try {
            $challengesDAO = new ChallengeDAO();
            $challenges = $challengesDAO->getAll();

            $hashtagChallengeDAO = new HashtagChallengeDAO();
            $awardsDAO = new AwardDAO();
            $usersDAO = new UserDAO();
            $usersList = [];
            $awardsList = [];
            $hashtagsList = [];

            foreach ($challenges as $challenge) {
                $usersList[$challenge->getIdChallenge()] = $usersDAO->getUserByChallengeId($challenge->getIdChallenge());
                $awardsList[$challenge->getIdChallenge()] = $awardsDAO->getAwardsByChallengeId($challenge->getIdChallenge());
                $hashtagsList[$challenge->getIdChallenge()] = $hashtagChallengeDAO->getHashtagByChallengeId($challenge->getIdChallenge());
            }
            $this->setViewParam('usersList', $usersList);
            $this->setViewParam('awardsList', $awardsList);
            $this->setViewParam('challenges', $challenges);
            $this->setViewParam('hashtagsList', $hashtagsList);
            $this->render('/challenge/index');
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }


    public function register()
    {
        $hashtagDAO = new HashtagDAO();
        $hashtags = $hashtagDAO->list();
        $this->setViewParam('hashtags', $hashtags);

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

        $hashtag = new Hashtag();
        $hashtag->setHashtag($_POST['hashtag']);
        $hashtagDAO = new HashtagDAO();
        $hashtagId = $hashtagDAO->save($hashtag);;
        $hashtagsChallengesDAO = new HashtagChallengeDAO();
        $hashtagsChallengesDAO->associateHashtagToChallenge($lastChallengeId, $hashtagId);
        $this->redirect('/challenge/index');
    }
}
