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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Booking;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class DefaultController extends Controller{

    
    public function createAction($task)
{

    $booking = new Booking();
    $booking->setName($task->name);
   
   

    $em = $this->getDoctrine()->getManager();
    $em->persist($booking);
    $em->flush();

    return new Response('Saved new booking for '.$booking->getName());
}
 /**
     * @Route("/data")
     */
     
    public function dataAction(Request $request)
    {
        $rooms = new Rooms();
        $task = new Task();
        
        $ro = $this->getDoctrine()
        ->getRepository(rooms::class)
        ->findAll();
        if (!$ro) {
        throw $this->createNotFoundException(
            'No rooms found for id '.$roId
            );
        }
        $form = $this->createFormBuilder($rooms)
            ->add('ocupat', CollectionType::class, array('entry_type'   => CheckboxType::class, 'entry_options'  => array('required' => false,),
            'allow_add' => true,
            'prototype' => true,))
            ->getForm();
        
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $id = $form->get('ocupat')->getData();
            $data->get(checked)->getData();
            //$id = $data->getName();
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository(Rooms::class)->findOneBy(array( 'roomsnr' => $id));
            if($data == "false") {
                $product->setOcupat(false);
            } else {
                $product->setOcupat(true);
            }
            $em->flush();
        }       
  
  
  
  // delete/add form         
         $delete = $this->createFormBuilder($task)
         ->add('room_type', ChoiceType::class, array(
            'choices'  => array(
                'Camera Simpla' => 0,
                'Camera Dubla' => 1,
                'Apartament' => 2,
            ),
            ))
            ->add('room_nr', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Delete Room'))
            ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add'))
            ->getForm();
            
            $delete->handleRequest($request);
            if ($delete->isSubmitted() && $delete->isValid()) {
                $task = $delete->getData();
            if('saveAndAdd' === $delete->getClickedButton()->getName()){
                $rooms = new Rooms();
                $rooms->setRoomtype($task->getRoomtype());
                $rooms->setRoomsnr($task->getRoomnr());
                $rooms->setOcupat(false);
   

                $em = $this->getDoctrine()->getManager();
                $em->persist($rooms);
                $em->flush();
            }
            if('save' === $delete->getClickedButton()->getName()){
                $em = $this->getDoctrine()->getManager();
                $product = $em->getRepository(Rooms::class)->findOneBy(array( 'roomsnr' => $task->getRoomnr(), 'roomtype' => $task->getRoomtype()));

                if (!$product) {
                    return $this->redirect('http://localhost:8000/data');

                }

                $em->remove($product);
                $em->flush();
                
            }
          return $this->redirect('http://localhost:8000/data');
            }
        
       // if ($form->getClickedButton() && 'saveAndAdd' === $form->getClickedButton()->getName()) {
      //  }
        foreach($ro as $r){
            
        
        
        }
        
        return $this->render('default/data.html.twig',array('room' => $ro, 'form' => $form->createView(),'del' => $delete->createView() ));


}
   
    

    /**
     * @Route("/home")
     */
      public function homeAction(Request $request)
    {
      $hom = $this->getDoctrine()
        ->getRepository(articol::class)
        ->findAll();
        if (!$hom) {
        throw $this->createNotFoundException(
            'No rooms found for id '.$homId
            );
        }
        
       
        return $this->render('default/home.html.twig', array('info' => $hom,));
         
   
    }
    /**
     * @Route("/contact")
     */
     
    public function contactAction(Request $request)
    {   
        $task = new Feedback();
        $task2 = new Feedback();
        
// form pt feedback
        $form = $this->createFormBuilder($task)
            ->add('feedback', TextareaType::class, array( 'attr' => array('style' => 'width: 400px', 'style' => 'height: 200px', )))
            ->add('Submit', SubmitType::class, array('label' => 'Send Feedback',
          ))
            ->getForm();
            
           $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                $task = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();
            }
            
// form pt contact
        $form2 = $this->createFormBuilder($task2)
            ->add('feedback', TextareaType::class, array( 'attr' => array('style' => 'width: 400px', 'style' => 'height: 200px', )))
            ->add('Submit', SubmitType::class, array('label' => 'Contact us',
          ))
            ->getForm();
            
           $form2->handleRequest($request);
            
            if ($form2->isSubmitted() && $form2->isValid()) {
                $task = $form2->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($task2);
                $em->flush();
            }
// date de contact            
        $hom = $this->getDoctrine()
        ->getRepository(contact::class)
        ->findAll();
        if (!$hom) {
        throw $this->createNotFoundException(
            'No rooms found for id '.$homId
            );
        }
        return $this->render('default/contact.html.twig', array('info' => $hom, 'form' => $form->createView(),'contact' => $form2->createView()));
         
   
    }
    /**
     * @Route("/form")
     */
     
    public function formAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        //$task->setTask('Rezervare');
        $ro = $this->getDoctrine()
        ->getRepository(Rooms_Oview::class)
        ->findAll();
        if (!$ro) {
        throw $this->createNotFoundException(
            'No rooms found for id '.$roId
            );
        }
        

        $form = $this->createFormBuilder($task)
            ->add('name', TextType::class)
            ->add('date_from', DateType::class)
            ->add('date_to', DateType::class)
            ->add('room_type', ChoiceType::class, array(
            'choices'  => array(
                'Camera Simpla' => 0,
                'Camera Dubla' => 1,
                'Apartament' => 2,
            ),
            ))
            ->add('room_nr', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Book_it'))
            ->getForm();
            
            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                if($task->getDateFrom() >= $task->getDateTo()){
                    $this->addFlash(
                    'notice',
                    'Invalid date'
                    );
                }else{
                
                $counter = 0;
                $task = $form->getData();
                $em = $this->getDoctrine()->getManager();
    
                $datefrom = clone $task->getDateFrom();
                $dateto = $task->getDateTo();
                while($datefrom != $dateto){
                    $product = $em->getRepository(Rooms_oview::class)->findOneBy(array( 'data' => $datefrom));
                    if($product->getRoomsnr() < $product->getNr() + $task->getRoomnr()){
                        $counter = $counter + 1;
                    }

                    $datefrom->modify('+1 day');
                }
                
                if($counter != 0){
                    $this->addFlash(
                    'notice',
                    'Rooms are not awaylable'
                    );
                    //return $this->redirect('http://localhost:8000/form');
               
               }else{
       
                $datefrom = clone $task->getDateFrom();
                while($datefrom != $dateto){
                    $product = $em->getRepository(Rooms_Oview::class)->findOneBy(array( 'data' => $datefrom));
                        $product->setNr($product->getNr() + $task->getRoomnr());
                        $em->persist($product);
                         $datefrom->modify('+1 day');
                }
                
                    
                    $booking = new Booking();
                    $booking->setName($task->getName());
                    $booking->setRoomtype($task->getRoomtype());
                    $booking->setRoomnr($task->getRoomnr());
                    $booking->setData($task->getDateFrom());
                    $booking->setDatato($task->getDateTo());
                    $booking->setSuma($task->getRoomnr()*$task->getRoomnr()*30);
                     $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                    );

                    $em->persist($booking);
                    $em->flush();
                    return $this->redirect('http://localhost:8000/form');
                }
                }
            }
        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    

// if you have multiple entity managers, use the registry to fetch them
public function verify(Booking $booking){




}
public function exampleAction(Request $request, $id){
    $inputValue = $request->get("button_name");
}

public function deleteRoom($nr , $type)
{
    $em = $this->getDoctrine()->getManager();
    $product = $em->getRepository(Rooms::class)->findOneBy(array( 'roomsnr' => $nr, 'roomstype' => $type));

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $em->remove($product);
    $em->flush();

    return $this->redirectToRoute('product_show', [
        'id' => $product->getId()
    ]);
}

public function modRoom($id)
{
    $em = $this->getDoctrine()->getManager();
    $product = $em->getRepository(Rooms::class)->findOneBy(array( 'id' => $id));

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $em->remove($product);
    $em->flush();

    return $this->redirectToRoute('product_show', [
        'id' => $product->getId()
    ]);
}

public function editAction()
{
    $doctrine = $this->getDoctrine();
    $em = $doctrine->getManager();
    $em2 = $doctrine->getManager('other_connection');
}

public function showAction($bookingId)
{
    $booking = $this->getDoctrine()
        ->getRepository(Booking::class)
        ->find($productId);

    if (!$booking) {
        throw $this->createNotFoundException(
            'No product found for id '.$bookingId
        );
    }

    // ... do something, like pass the $product object into a template
}

public function registerAction(UserPasswordEncoderInterface $encoder)
{
    // whatever *your* User object is
    $user = new AppBundle\Entity\User();
    $plainPassword = 'pass1234';
    $encoded = $encoder->encodePassword($user, $plainPassword);

    $user->setPassword($encoded);
}  
    
}
