<?php
namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User('admin', 'pass1234');
        $manager->persist($userAdmin);
        $manager->flush();

        // other fixtures can get this object using the 'admin-user' name
        $this->addReference('admin-user', $userAdmin);
    }
}


