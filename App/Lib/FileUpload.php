<?php

namespace App\Lib;

class FileUpload
{
    private $name;
    private $extension;
    private $type;
    private $tmpName;
    private $error;
    private $size;
    private $duplicates = 0;

    public function __construct($file)
    {
        $info = pathinfo($file['name']);

        $this->name = $info['filename'];
        $this->extension = $info['extension'];
        $this->type = isset($file['type']) ? $file['type'] : '';
        $this->tmpName = isset($file['tmp_name']) ? $file['tmp_name'] : '';
        $this->error = isset($file['error']) ? $file['error'] : '';
        $this->size = isset($file['size']) ? $file['size'] : '';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getError()
    {
        return $this->error;
    }

    public function generateName()
    {
        $this->name = time() . '-' . rand(100000, 999999) . '-' . uniqid();
    }

    public function getBasename()
    {
        $extension = strlen($this->extension) ? '.' . $this->extension : '';
        $duplicates = $this->duplicates > 0 ? '-' . $this->duplicates : '';
        return $this->name . $duplicates . $extension;
    }

    private function getPossibleBasename($dir, $overwrite)
    {
        if ($overwrite) return $this->getBasename();

        $basename = $this->getBasename();

        if (!file_exists($dir . '/' . $basename)) {
            return $basename;
        }

        $this->duplicates++;

        return $this->getPossibleBasename($dir, $overwrite);
    }

    public function upload($dir, $overwrite = true)
    {
        if ($this->error != 0) return false;

        $path = $dir . '/' . $this->getPossibleBasename($dir, $overwrite);

        return move_uploaded_file($this->tmpName, $path);
    }

    public static function createMultiUpload($files)
    {
        $uploads = [];

        foreach ($files['name'] as $key => $value) {
            $file = [
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key],
                'size' => $files['size'][$key]
            ];

            $uploads[] = new FileUpload($file);
        }

        return $uploads;
    }
}
