<?php
require_once '../datasource/connection.php';

class FriendDTO
{
    private $id;
    private $paternalLastName;
    private $maternalLastName;
    private $name;

    public function setId($id = 0)
    {
        $this->id = $id;
    }

    public function setPaternalLastName($paternalLastName)
    {
        $this->paternalLastName = $paternalLastName;
    }

    public function setMaternalLastName($maternalLastName)
    {
        $this->maternalLastName = $maternalLastName;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPaternalLastName()
    {
        return $this->paternalLastName;
    }

    public function getMaternalLastName()
    {
        return $this->maternalLastName;
    }

    public function getName()
    {
        return $this->name;
    }

}