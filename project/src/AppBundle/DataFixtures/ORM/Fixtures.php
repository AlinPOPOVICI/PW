<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Rooms;
use AppBundle\Entity\Rooms_Oview;
use AppBundle\Entity\Articol;
use AppBundle\Entity\Contact;
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
            for ($j = 1; $j <= $VAR; $j++) {
            
                $rooms_o = new Rooms();
                $rooms_o->setRoomtype($i);
                $rooms_o->setRoomsnr($j);
                   //for ($j = 0; $j < 365; $j++) {
                       $rooms_o->setoCUPAT(mt_rand(0,1));
                   // }
                $manager->persist($rooms_o);
                
            }
        }
        
        $articol = new Articol();
        $articol->setName("Version 1");
        $articol->setSuma(mt_rand(180, 400));
        $articol->setTxt("Hotel Timiş este cel mai mare din oraş, cu 191 de camere şi 18 apartamente. Oaspeţii au avantajul poziţiei privilegiate, în chiar centrul oraşului.\n
                          Spaţiile publice ale hotelului adăpostesc o importantă colecţie de artă românească contemporană. Reamenajat şi renovat recent, Hotel Timişoara se \n
                          identifică, mai mult ca niciodată, cu oraşul al cărui nume îl poartă: cosmopolit, conectat, surprinzător şi efervescent.\n");
        
        $manager->persist($articol);
        
        $articol = new Articol();
        $articol->setName("Version 2");
        $articol->setSuma(mt_rand(180, 400));
        $articol->setTxt("Bucura-te de confort intr-o locatie moderna!\n
                          Hotel CheckInn Timisoara este situat intr-o \n
                          zona activa a orasului, cu acces rapid la cele\n
                          mai interesante centre culturale. 45 de camere\n 
                          si 3 apartamente va stau la dispozitie in cel\n
                          mai nou si modern hotel din Timisoara.\n
                          Acesta este completat de Restaurantul Check Inn,\n
                          care poate acomoda aproximativ \n
                          60 de persoane in acelasi timp\n");        
        $manager->persist($articol);
        
        $contact = new Contact();
        $contact->setNume("Sediul Hotelului");
        $contact->setEmail("timis.hotel@gmail.com");
        $contact->setTelefon("0728555666");
        $contact->setAdresa("56 1 Decembrie str. Timisoara");
        
        $manager->persist($contact);




        

        $manager->flush();
    }
}
