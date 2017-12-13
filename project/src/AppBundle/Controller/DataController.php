<?php

namespace AppBundle\Controller;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Task;
use AppBundle\Entity\Rooms;
use AppBundle\Entity\Rooms_Oview;
use AppBundle\Entity\Articol;
use AppBundle\Entity\Feedback;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class DataController extends Controller{
 /**
     * @Route("/rezerv")
     */
      public function dataAction(Request $request)
    {
        $rooms = new Rooms();
        $task = new Task();
        $k = 1;
        $stack = array();
        
        $em = $this->getDoctrine()->getManager();
        
               $ro = $this->getDoctrine()
                ->getRepository(Booking::class)
                ->findAll();
                if (!$ro) {
                throw $this->createNotFoundException(
                    'No Bookings found for id '
            
                    );
                }
        
        
  // delete/add form         
         $show = $this->createFormBuilder($task)
            ->add('date_from', DateType::class)
            ->add('date_to', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'View for Dates'))
            ->getForm();
            
            $show->handleRequest($request);
            
            if ($show->isSubmitted() && $show->isValid()) {
                $task = $show->getData();
                $k = 2;
                
                $datefrom = clone $task->getDateFrom();
                $dateto = $task->getDateTo();
                
                while($datefrom != $dateto){
                    $product = $em->getRepository(Booking::class)->findOneBy(array( 'data' => $datefrom));
                    if($product){
                    $clone = clone $product;
                    array_push($stack, $clone);
                    }
                    $datefrom->modify('+1 day');
                   
                }
               // return $this->redirect('http://localhost:8000/rezerv');  
             }
             
             $task2 = new Task();
             
             $delete = $this->createFormBuilder($task2)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Delete Booking'))
            ->getForm();
            
            $delete->handleRequest($request);
            
            if ($delete->isSubmitted() && $delete->isValid()) {       
             
                $em = $this->getDoctrine()->getManager();
                $product = $em->getRepository(Booking::class)->findOneBy(array( 'name' => $task2->getName()));
                
                $datefrom = clone $product->getData();
                $dateto = $product->getDatato();
                
                while($datefrom != $dateto){
                    $product = $em->getRepository(Rooms_Oview::class)->findOneBy(array( 'data' => $datefrom));
                        $product->setNr($product->getNr() - $product->getRoomsnr());
                        $em->persist($product);
                        $datefrom->modify('+1 day');
                
                }
                  $product = $em->getRepository(Booking::class)->findOneBy(array( 'name' => $task2->getName()));
                if (!$product) {
                    return $this->redirect('http://localhost:8000/rezerv');

                }

                $em->remove($product);
                $em->flush();   
                return $this->redirect('http://localhost:8000/rezerv');    
               }
               
  
                    
        
        return $this->render('default/rezerv.html.twig',array('k' => $k, 'stack' => $stack, 'book' => $ro, 'form' => $show->createView(),'del' => $delete->createView() ));

}


 /**
     * @Route("/oview")
     */
      public function oviewAction(Request $request)
    {
        $rooms = new Rooms();
        $task = new Task();
        $k = 1;
        $stack = array();
        
        $em = $this->getDoctrine()->getManager();
        
               $ro = $this->getDoctrine()
                ->getRepository(Rooms_Oview::class)
                ->findAll();
                if (!$ro) {
                throw $this->createNotFoundException(
                    'No Bookings found for id '
            
                    );
                }
        
        
  // delete/add form         
         $show = $this->createFormBuilder($task)
            ->add('date_from', DateType::class)
            ->add('date_to', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'View for Dates'))
            ->getForm();
            
            $show->handleRequest($request);
            
            if ($show->isSubmitted() && $show->isValid()) {
                $task = $show->getData();
                $k = 2;
                
                $datefrom = clone $task->getDateFrom();
                $dateto = $task->getDateTo();
                
                while($datefrom != $dateto){
                    $product = $em->getRepository(Rooms_Oview::class)->findOneBy(array( 'data' => $datefrom));
                    if($product){
                    $clone = clone $product;
                    array_push($stack, $clone);
                    }
                    $datefrom->modify('+1 day');
                   
                }
               // return $this->redirect('http://localhost:8000/rezerv');  
             }
             
             
  
                    
        
        return $this->render('default/camere.html.twig',array('k' => $k, 'stack' => $stack, 'book' => $ro, 'form' => $show->createView() ));

}
}
     
