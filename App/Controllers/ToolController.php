<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\ToolDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Tool;
use Exception;

class ToolController extends Controller
{
  public function index()
  {
    $toolDao = new ToolDAO();
    $tools = $toolDao->list();

    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->setViewParam('tools', $tools);
    $this->render('/tool/index');
  }

  public function register()
  {
        
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->render('/tool/register');
  }


  public function save()
  {
    try {
      if ($_FILES['icon']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Erro durante o upload do ícone.");
      }

      $caption = $_POST['caption'];
      if (empty($caption)) {
        throw new Exception("O campo de legenda não pode estar vazio.");
      }

      $tool = new Tool();
      $tool->setCaption($caption);
      $tool->setColor($_POST["color"]);
      $toolDAO = new ToolDAO();
      $toolId = $toolDAO->save($tool);

      $objUpload = new Upload($_FILES['icon']);
      $objUpload->setName('icon-id' . $toolId);
      $dir = 'public/images/tools';
      $success = $objUpload->upload($dir);

      if (!$success) {
        throw new Exception("Erro ao enviar o ícone da ferramenta.");
      }

      $tool->setIcon($objUpload->getBasename());
      $toolDAO->updateIcon($toolId, $tool->getIcon());

      Sessao::gravaMensagem("Ferramenta cadastrada com sucesso!");
      $this->redirect('/tool');
    } catch (Exception $e) {
      Sessao::gravaErro("Erro ao cadastrar a ferramenta. " . $e->getMessage());
      $this->redirect('/tool/register');
    }
  }

  public function alter($params)
  {
    $idTool = $params[0];

    $toolDao = new ToolDAO();
    $tool = $toolDao->getById($idTool);
    $this->setViewParam('tool', $tool);
    $this->render('/tool/alter');
  }

  public function update()
  {
      $idTool = $_POST['idTool'];
      $caption = $_POST['caption'];
  
      try {
          if (empty($caption)) {
              throw new Exception("O campo de legenda não pode estar vazio.");
          }
  
          $toolDAO = new ToolDAO();
          $tool = $toolDAO->getById($idTool);
  
          if (!$tool) {
              throw new Exception("Ferramenta não encontrada.");
          }
  
          $tool->setCaption($caption);
          $tool->setColor($_POST["color"]);
          if ($_FILES['icon']['error'] === UPLOAD_ERR_OK) {
              $objUpload = new Upload($_FILES['icon']);
              $objUpload->setName('icon-id' . $idTool);
              $dir = 'public/images/tools';
              $success = $objUpload->upload($dir);
  
              if (!$success) {
                  throw new Exception("Erro ao enviar o novo ícone da ferramenta.");
              }
  
              $tool->setIcon($objUpload->getBasename());
              $toolDAO->updateIcon($idTool, $tool->getIcon());
          }
  
          $toolDAO->edit($tool);
          Sessao::gravaMensagem("Ferramenta atualizada com sucesso!");
          $this->redirect('/tool');
      } catch (Exception $e) {
          Sessao::gravaErro("Erro ao atualizar a ferramenta. " . $e->getMessage());
          $this->redirect('/tool/editar/' . $idTool);
      }
  }
  


  public function drop($params)
  {
    $idTool = $params[0];

    $toolDao = new ToolDAO();

    try {
      $toolDao->drop($idTool);
      Sessao::gravaMensagem("Ferramenta excluída com sucesso!");
    } catch (Exception $e) {
      Sessao::gravaErro("Erro ao excluir a ferramenta. Por favor, tente novamente.");
    }

    $this->redirect('/tool');
  }
}
