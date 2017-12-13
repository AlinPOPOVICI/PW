<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articol")
 */

class Articol{
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
     * @ORM\Column(type="string", length=100)

     */
    private $photo;
    /**
     * @ORM\Column(type="integer")
     */
    private $suma;
    /**
     * @ORM\Column(type="text")
     */
    private $txt;
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name  = $name;
    }
    
    
    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo  = $photo;
    }
    
    
    
    
    public function getTxt()
    {
        return $this->txt;
    }

    public function setTxt($txt)
    {
        $this->txt  = $txt;
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

