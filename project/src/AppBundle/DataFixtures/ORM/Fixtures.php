<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Rooms;
use AppBundle\Entity\Rooms_Oview;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 3; $i++) {
            $rooms = new Rooms_Oview();
            $rooms->setRoomtype($i);
            $VAR=mt_rand(20, 30);
            $rooms->setRoomsnr($VAR);
            $rooms->setNr(mt_rand(1, 20));
            $manager->persist($rooms);
            for ($j = 0; $j < $VAR; $j++) {
            
                $rooms_o = new Rooms();
                $rooms_o->setRoomtype($i);
                $rooms_o->setRoomsnr($i);
                   for ($j = 0; $j < 365; $j++) {
                        $rooms_o->setoCUPAT(mt_rand(0,1));
                    }
                $manager->persist($rooms_o);
                
            }
        }
        

        $manager->flush();
    }
}
