<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="feedback")
 */

class Feedback{
/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @ORM\Column(type="text")
     */
    private $feedback;
    
    public function getFeedback()
    {
        return $this->feedback;
    }

    public function setFeedback($feedback)
    {
        $this->feedback  = $feedback;
    }
    

}

