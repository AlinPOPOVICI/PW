<?php
namespace AppBundle\Entity;
# toate camerele fiecar ecu nr ei cu care o recunastem
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
 
class Rooms{
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
    private $roomsnr;
    
     /**
     * @ORM\Column(type="boolean")
     */
    private $ocupat;
    
    
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

    public function setRoomtypee($roomtype)
    {
        $this->roomtype  = $roomtype;
    }
    
    
    
    
    public function getRoomsnr()
    {
        return $this->roomsnr;
    }

    public function setRoomsnr($roomsnr)
    {
        $this->roomsnr  = $roomsnr;
    }
    
     public function getOcupat()
    {
        return $this->ocupat;
    }

    public function setOcupat($ocupat)
    {
        $this->ocupat  = $ocupat;
    }

}
