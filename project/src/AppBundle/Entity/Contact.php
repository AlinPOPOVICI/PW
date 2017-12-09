<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */

class Contact{
/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @ORM\Column(type="text")
     */
    private $nume;
    /**
     * @ORM\Column(type="text")
     */
    private $telefon;
    /**
     * @ORM\Column(type="text")
     */
    private $email;
    /**
     * @ORM\Column(type="text")
     */
    private $adresa;
    
    public function getNume()
    {
        return $this->nume;
    }

    public function setNume($nume)
    {
        $this->nume  = $nume;
    }
    
    
    
    public function getTelefon()
    {
        return $this->telefon;
    }

    public function setTelefon($telefon)
    {
        $this->telefon  = $telefon;
    }
    
    
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email  = $email;
    }
    
    
    
    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa  = $adresa;
    }
}

