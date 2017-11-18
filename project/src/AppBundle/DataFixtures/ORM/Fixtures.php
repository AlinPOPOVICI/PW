<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Rooms;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 3; $i++) {
            $rooms = new Rooms();
            $rooms->setRoomtype($i);
            $rooms->setRoomsnr(mt_rand(20, 30));
            $rooms->setOcupat(mt_rand(1, 20));
            $manager->persist($rooms);
        }

        $manager->flush();
    }
}
