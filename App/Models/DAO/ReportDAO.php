<?php

namespace App\Models\DAO;

use App\Models\Entidades\Report;

class ReportDAO extends BaseDAO
{
  public function saveReport(Report $report)
  {
      try {
          $idUser = $report->getIdUser()->getIdUser();
          $idProject = $report->getIdProject()->getIdProject();
          $reportText = $report->getReport();
          $action = $report->getAction();
  
          $params = [
              ':idUser' => $idUser,
              ':idProject' => $idProject,
              ':report' => $reportText,
              ':action' => $action,
          ];

          return $this->insert('Report', ':idUser, :idProject, :report, :action', $params);

  
      } catch (\Exception $e) {
          throw new \Exception("Error saving report data. " . $e->getMessage(), 500);
      }
  }
  
  
  
  
}
