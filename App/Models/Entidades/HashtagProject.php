<?php

namespace App\Models\Entidades;

class HashtagProject
{
    private Hashtag $hashtag;
    private Project $project;
 
    public function getHashtag(): Hashtag
    {
        return $this->hashtag;
    }

    public function setHashtag(Hashtag $hashtag): self
    {
        $this->hashtag = $hashtag;
        return $this;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): self
    {
        $this->project = $project;
        return $this;
    }
}
