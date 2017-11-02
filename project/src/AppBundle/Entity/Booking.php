<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articol")
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
     * @ORM\Column(type="text")
     */
    private $text;

}
