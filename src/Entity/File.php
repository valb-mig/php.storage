<?php
declare(strict_types=1);

namespace App\Entity;

class File
{
    public string $name;
    public int    $size;
    public string $type;
    public string $modified;
    public string $created;
    public string $accessed;
    public string $permissions;
    public string $owner;
    public string $group;

    public function __construct(
        string $filePath
    ) {
        $this->name = basename($filePath);
        $this->size = filesize($filePath);
        $this->type = mime_content_type($filePath);
        $this->modified = date('d/m/Y H:i:s', filemtime($filePath));
        $this->created  = date('d/m/Y H:i:s', filectime($filePath));
        $this->accessed = date('d/m/Y H:i:s', fileatime($filePath));
        $this->permissions = substr(sprintf('%o', fileperms($filePath)), -4);
        $this->owner = posix_getpwuid(fileowner($filePath))['name'];
        $this->group = posix_getgrgid(filegroup($filePath))['name'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getAccessed()
    {
        return $this->accessed;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getGroup()
    {
        return $this->group;
    }
}