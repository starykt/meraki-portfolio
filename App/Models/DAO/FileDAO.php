<?php

namespace App\Models\DAO;

use App\Models\Entidades\File;
use Exception;

class FileDAO extends BaseDAO 
{
    public function getById(int $idFile)
    {
        $result = $this->select("SELECT * FROM Files WHERE idFile = $idFile");

        return $result->fetchObject(File::class);
    }

    public function save(File $file)
    {
        try {
            $idProject = $file->getIdProject()->getIdProject();
            $fileName = $file->getFile();
            
            $params = [
                ':idProject' => $idProject,
                ':file' => $fileName,
            ];

            return $this->insert('Files', ':idProject, :file', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving file data. " . $e->getMessage(), 500);
        }
    }

    public function associateFilesWithProject(int $idProject, array $fileNames)
    {
        try {
            $projectDAO = new ProjectDAO();
            $project = $projectDAO->getById($idProject);
    
            foreach ($fileNames as $fileName) {
                $file = new File();
                $file->setIdProject($project);
                $file->setFile($fileName);
                $this->save($file);
            }
    
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error associating files with the project. " . $e->getMessage(), 500);
        }
    }
    
    

}
