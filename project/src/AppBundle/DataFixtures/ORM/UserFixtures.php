<?php
namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    
        $encoder = new  BCryptPasswordEncoder(15);
        $plainPassword = 'pass';
        $encoded = $encoder->encodePassword($plainPassword, 0);
        
    
    
        $userAdmin = new User('admin', $encoded);
        
        
        $manager->persist($userAdmin);
        $manager->flush();

        // other fixtures can get this object using the 'admin-user' name
        $this->addReference('admin-user', $userAdmin);
    }
}


