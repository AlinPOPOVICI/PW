<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 */
 
class Booking{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)

     */
    private $name;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $suma;
   /**
     * @ORM\Column(type="integer")
     */
    private $roomtype;
    /**
     * @ORM\Column(type="integer")
     */
    private $roomsnr;
    
    
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
    
    
    
    
    public function getRoomsnr()
    {
        return $this->roomsnr;
    }

    public function setRoomnr($roomsnr)
    {
        $this->roomsnr  = $roomsnr;
    }
    
    
    
    public function getSuma()
    {
        return $this->suma;
    }

    public function setSuma($suma)
    {
        $this->suma  = $suma;
    }
    
    
    

}
