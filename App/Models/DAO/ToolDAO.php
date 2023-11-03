<?php

namespace App\Models\DAO;

use App\Models\Entidades\Tool;
use Exception;

class ToolDAO extends BaseDAO
{

  public function list()
  {
      $result = $this->select("SELECT * FROM Tools");

      $dataSet = $result->fetchAll();
      $listTool = [];

      if ($dataSet) {
          foreach ($dataSet as $data) {
              $tool = new Tool();
              $tool->setIdTool($data['idTool']);
              $tool->setIcon($data['icon']);
              $tool->setCaption($data['caption']);
              $listTool[] = $tool;
          }
      }

      return $listTool;
  }

    public function getById(int $idTool)
    {
        $resultado = $this->select("SELECT * FROM Tools WHERE idTool = $idTool");
        $toolData = $resultado->fetch();

        if ($toolData) {
            $tool = new Tool();
            $tool->setIdTool($toolData['idTool']);
            $tool->setIcon($toolData['icon']);
            $tool->setCaption($toolData['caption']);
            return $tool;
        }

        return null;
    }

    public function save(Tool $tool)
    {
        try {
            $icon = $tool->getIcon();
            $caption = $tool->getCaption();

            $params = [
                ':icon' => $icon,
                ':caption' => $caption,
            ];

            return $this->insert('Tools', ':icon, :caption', $params);
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

   

public function updateIcon($toolId, $iconName)
{
  try {
    $idTool = $toolId;
    $icon = $iconName;

    $params = [
        ':idTool' => $idTool,
        ':icon' => $icon,
    ];

    return $this->update('Tools', "icon = :icon", $params, "idTool = :idTool");
} catch (\Exception $e) {
    throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
}
}


    public function edit(Tool $tool)
    {
        try {
            $idTool = $tool->getIdTool();
            $icon = $tool->getIcon();
            $caption = $tool->getCaption();

            $params = [
                ':idTool' => $idTool,
                ':icon' => $icon,
                ':caption' => $caption,
            ];

            return $this->update('Tools', "icon = :icon, caption = :caption", $params, "idTool = :idTool");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function drop(int $idTool)
    {
        try {
            return $this->delete('Tools', "idTool = $idTool");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a ferramenta. " . $e->getMessage(), 500);
        }
    }
}
