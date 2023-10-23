<?php

namespace App\Models\DAO;

use App\Models\Entidades\Image;
use App\Models\Entidades\Project;
use Exception;

class ImageDAO extends BaseDAO 
{
    public function getById(int $idImage)
    {
        $result = $this->select("SELECT * FROM Images WHERE idImage = $idImage");

        return $result->fetchObject(Image::class);
    }

    public function save(Image $image)
    {
        try {
            $idProject = $image->getIdProject()->getIdProject();
            $imageName = $image->getImage(); 
            
            $params = [
                ':idProject' => $idProject,
                ':image' => $imageName,
            ];

            return $this->insert('Images', ':idProject, :image', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving image data. " . $e->getMessage(), 500);
        }
    }
    public function associateImagesWithProject(int $idProject, array $imageNames)
    {
        try {
            $projectDAO = new ProjectDAO();
            $project = $projectDAO->getById($idProject);
    
            foreach ($imageNames as $imageName) {
                $image = new Image();
                $image->setIdProject($project);
                $image->setImage($imageName);
                $this->save($image);
            }
    
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error associating images with the project. " . $e->getMessage(), 500);
        }
    }
    
    public function countImagesByProjectId($idProject)
    {
        $result = $this->select("SELECT COUNT(*) FROM Images WHERE idProject = $idProject");
        return $result->fetchColumn();
    }

    public function getImagesByProjectId($idProject)
{
    $result = $this->select("SELECT * FROM Images WHERE idProject = $idProject");
    $images = [];

    while ($imageData = $result->fetch()) {
        $image = new Image();
        $image->setImage($imageData['image']);
        $images[] = $image;
    }

    return $images;
}

}
