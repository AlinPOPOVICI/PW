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
     * @ORM\Column(type="DateType")
     */
    private $date_in;
    /**
     * @ORM\Column(type="DateType")
     */
    private $date_to;
    /**
     * @ORM\Column(type="integer")
     */
    private $roomtype;
    /**
     * @ORM\Column(type="integer")
     */
    private $rooms;

}
