<?php

namespace App\Models\DAO;

use App\Models\Entidades\Project;
use App\Models\Entidades\Report;
use App\Models\Entidades\User;

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
    public function getAllReportsWithProjects()
    {
        try {
            $sql = "SELECT * FROM Report";
            $result = $this->select($sql);

            $reportsWithProjects = [];

            while ($reportData = $result->fetch()) {
                $projectDAO = new ProjectDAO();
                $project = $projectDAO->getById($reportData['idProject']);

                $userDAO = new UserDAO();
                $user = $userDAO->getById($reportData['idUser']);
                $report = new Report();
                $report->setIdReport($reportData['idReport']);
                $report->setIdUser($user);
                $report->setIdProject($project);
                $report->setReport($reportData['report']);

                $reportsWithProjects[] = $report;
            }

            return $reportsWithProjects;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching reports with projects. " . $e->getMessage(), 500);
        }
    }


    public function getAllReports()
    {
        try {
            $reports = [];
            $result = $this->select("SELECT * FROM Report");

            $userDAO = new UserDAO();

            while ($reportData = $result->fetch()) {
                $report = new Report();
                $report->setIdReport($reportData['idReport']);
                $report->setReport($reportData['report']);
                $user = $userDAO->getById($reportData['idUser']);
                $report->setIdUser($user);

                $reports[] = $report;
            }

            return $reports;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching reports. " . $e->getMessage(), 500);
        }
    }

    public function getReportByProjectId(int $idProject)
    {
        $resultado = $this->select("SELECT * FROM Report WHERE idProject = $idProject");
        $reportData = $resultado->fetch();

        if ($reportData) {
            $report = new Report();
            $report->setIdReport($reportData['idReport']);
            $report->setReport($reportData['report']);
            $userDAO = new UserDAO();
            $user = $userDAO->getById($reportData['idUser']);
            $report->setIdUser($user);

            return $report;
        }

        return null;
    }

    public function drop(int $idReport)
    {
        try {
            return $this->delete('Report', "idReport = $idReport");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting project files. " . $e->getMessage(), 500);
        }
    }
}
