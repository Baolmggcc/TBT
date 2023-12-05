<?php
namespace App\Entity;


class Student{
    private $id;
    private $fName;
    private $gender;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fName
     */ 
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * Set the value of fName
     *
     * @return  self
     */ 
    public function setFName($fName)
    {
        $this->fName = $fName;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
}
?>