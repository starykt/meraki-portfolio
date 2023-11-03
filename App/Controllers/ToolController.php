<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\ToolDAO;
use App\Models\Entidades\Tool;
use Exception;

class ToolController extends Controller
{
  public function index()
  {
    $toolDao = new ToolDAO();
    $tools = $toolDao->list();
    $this->setViewParam('tools', $tools);
    $this->render('/tool/index');
  }

  public function register()
  {
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
  

  public function editar($params)
  {
    $idTool = $params[0];

    $toolDao = new ToolDAO();
    $tool = $toolDao->getById($idTool);

    if ($tool) {
      $this->setViewParam('tool', $tool);
      $this->render('tool/edit');
    } else {
      Sessao::gravaErro("Ferramenta não encontrada.");
      $this->redirect('/tool');
    }
  }

  public function atualizar()
  {
    $idTool = $_POST['idTool'];
    $icon = $_POST['icon'];
    $caption = $_POST['caption'];

    $tool = new Tool();
    $tool->setIdTool($idTool);
    $tool->setIcon($icon);
    $tool->setCaption($caption);

    $toolDao = new ToolDAO();

    try {
      $toolDao->edit($tool);
      Sessao::gravaMensagem("Ferramenta atualizada com sucesso!");
      $this->redirect('/tool');
    } catch (Exception $e) {
      Sessao::gravaErro("Erro ao atualizar a ferramenta. Por favor, tente novamente.");
      $this->redirect('/tool/editar/' . $idTool);
    }
  }

  public function excluir($params)
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
