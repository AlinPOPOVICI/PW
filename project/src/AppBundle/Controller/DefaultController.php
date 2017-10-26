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


class DefaultController extends Controller{

    /**
     * @Route("/form")
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Rezervare');

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('name', TextType::class)
            ->add('date_from', DateType::class)
            ->add('date_to', DateType::class)
            ->add('room_type', ChoiceType::class, array(
            'choices'  => array(
                'Mayb' => null,
                'Yes' => true,
                'No' => false,
            ),
            ))
            ->add('room_nr', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Book_it'))
            ->getForm();

        return $this->render('default/new.html.php', array(
            'form' => $form->createView(),
        ));
    }
}
