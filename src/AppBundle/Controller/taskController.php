<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class taskController extends Controller
{
    /**
     * @Route("/tasks")
     */
    public function tasksAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository('AppBundle:Task')->findAll();

        return $this->render('AppBundle:task:tasks.html.twig', array(
            'tasks' => $tasks
        ));
    }

    /**
     * @Route("/task/{taskId}")
     */
    public function taskDetailAction($taskId)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppBundle:Task')->findOneById($taskId);

        return $this->render('AppBundle:task:task_detail.html.twig', array(
            'task' => $task
        ));
    }

    /**
     * @Route("/task/edit/{taskId}")
     */
    public function taskEditAction($taskId)
    {
        return $this->render('AppBundle:task:task_edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/task/delete/{taskId}")
     */
    public function taskDeleteAction($taskId)
    {
        return $this->render('AppBundle:task:task_delete.html.twig', array(
            // ...
        ));
    }

}
