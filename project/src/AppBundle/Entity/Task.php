<?php
namespace AppBundle\Entity;

class Task
{ 
    //telefon, adresa, mail
    protected $task;
    protected $name;
    protected $date_from;
    protected $date_to;
    protected $room_type;
    protected $room_nr;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }
    
    public function getDate_from()
    {
        return $this->date_from;
    }

    public function setDate_from(\DateTime $dueDate = null)
    {
        $this->dueDate = $date_from;
    }
    
    public function getDate_to()
    {
        return $this->date_to;
    }

    public function setDate_to(\DateTime $dueDate = null)
    {
        $this->dueDate = $date_to;
    }
    
    
    public function getRoom_type()
    {
        return $this->room_type;
    }

    public function setRoom_type($task)
    {
        $this->task = $room_type;
    }
    public function getRoom_nr()
    {
        return $this->room_nr;
    }

    public function setRoom_nr($task)
    {
        $this->task = $room_nr;
    }
    
}   
