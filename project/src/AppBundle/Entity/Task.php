<?php

namespace AppBundle\Entity;

class Task
{ 
    //telefon, adresa, mail
    protected $name;
    protected $date_from;
    protected $date_to;
    protected $room_type;
    protected $room_nr;
    protected $box;

    
    //name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name  = $name;
    }
    
    //date_from
    public function getDateFrom()
    {
        return $this->date_from;
    }

    public function setDateFrom(\DateTime $date_from = null)
    {
        $this->date_from = $date_from;
    }
    
    //date_to
    public function getDateTo()
    {
        return $this->date_to;
    }

    public function setDateTo(\DateTime $date_to = null)
    {
        $this->date_to= $date_to;
    }
    
    //room_type
    public function getRoomtype()
    {
        return $this->room_type;
    }

    public function setRoomtype($room_type)
    {
        $this->room_type= $room_type;
    }
    
    //room_nr
    public function getRoomnr()
    {
        return $this->room_nr;
    }

    public function setRoomnr($room_nr)
    {
        $this->room_nr = $room_nr;
    }
    
     public function getBox()
    {
        return $this->box;
    }

    public function setPublic($box)
    {
        $this->box  = $box;
    }
    
}   
