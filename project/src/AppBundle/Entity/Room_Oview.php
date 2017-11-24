<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms_oview")
 */
 
class Rooms_Oview{
/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $roomtype;
    /**
     * @ORM\Column(type="integer")
     */
    private $nr;   #total camere de un tip
     /**
     * @ORM\Column(type="integer")
     */
    private $roomsnr;  # camere ocupate de tipul respectiv 
    
    
         public function getID()
    {
        return $this->id;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name  = $name;
    }
    
    
    
    public function getRoomtype()
    {
        return $this->roomtype;
    }

    public function setRoomtype($roomtype)
    {
        $this->roomtype  = $roomtype;
    }
    
    
    
    
    public function getNr()
    {
        return $this->nr;
    }

    public function setNr($nr)
    {
        $this->nr  = $nr;
    }
    
     public function getRoomsnr()
    {
        return $this->roomsnr;
    }

    public function setRoomsnr($roomsnr)
    {
        $this->roomsnr  = $roomsnr;
    }

}
