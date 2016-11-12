<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class taskController extends Controller
{
    /**
     * @Route("/tasks", name="tasks")
     */
    public function tasksAction(Request $request)
    {
        $page = $request->query->get('page') ?: 1;
        $today = date('Y/m/d');
        $date = str_replace('-', '/', $request->query->get('date')) ?: $today;
        $week = $request->query->get('week') ?: date('W');
        $year = $request->query->get('year') ?: date('Y');

        $selected = new \DateTime($date);

        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository('AppBundle:Task')->findTasksByDay(1, $today);


        $days = array();

        for ($day = 1; $day <= 7; $day++) {
            $days[] = new \DateTime(date('Y/m/d', strtotime($year."W".$week.$day)));
        }

        // Generate links

        // FIXME : Change week links
        $dateNext = new \DateTime();
        $dateNext->modify("+1 day");

        $datePast = new \DateTime();
        $datePast->modify("-1 day");

        $todayLink = $this->generateUrl("tasks", array('date' => str_replace('/', '-', $today)));

        return $this->render('AppBundle:task:tasks.html.twig', array(
            'tasks' => $tasks,
            'past' => $datePast,
            'next' => $dateNext,
            'days' => $days,
            'selected' => $selected,
            'todayLink' => $todayLink,
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
