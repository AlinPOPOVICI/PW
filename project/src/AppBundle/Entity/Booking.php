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
      /**
 * @var date $data
 *
 * @ORM\Column(name="data", type="date", nullable=true)
 */
    private $data;
      /**
 * @var date $data
 *
 * @ORM\Column(name="datato", type="date", nullable=true)
 */
    private $datato;
    
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
    
    
    
      public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data  = $data;
    }
    
    
    
    
      public function getDatato()
    {
        return $this->datato;
    }

    public function setDatato($datato)
    {
        $this->datato  = $datato;
    }
    

}
