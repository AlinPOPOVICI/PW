<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Task;
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
     * @Route("/home")
     */
     
    public function homeAction(Request $request)
    {
       
        return $this->render('default/new2.html.twig', array());
         
   
    }
/**
     * @Route("/contact")
     */
     
    public function contactAction(Request $request)
    {
       
        return $this->render('default/new.html2.twig', array());
         
   
    }
    /**
     * @Route("/form")
     */
     
    public function formAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        //$task->setTask('Rezervare');

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
                $task = $form->getData();
               
                $booking = new Booking();
                $booking->setName($task->getName());
                $booking->setRoomtype($task->getRoomtype());
                $booking->setRoomnr($task->getRoomnr());
                $booking->setSuma($task->getRoomnr()*$task->getRoomnr()*30);
   

                $em = $this->getDoctrine()->getManager();
                $em->persist($booking);
                $em->flush();
            }
        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    

// if you have multiple entity managers, use the registry to fetch them
public function verify(Booking $booking){




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
    
    
}
