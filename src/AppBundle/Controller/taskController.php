<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;


class taskController extends Controller
{
    /**
     * @Route("/tasks", name="tasks")
     */
    public function tasksAction(Request $request)
    {
        $page = $request->query->get('page') ?: 1;
        $date = $request->query->get('date') !== null ? Carbon::parse($request->query->get('date')) : Carbon::today();

        // Get all task for the selected day
        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository('AppBundle:Task')->findTasksByDay(1, $date);

        // get the Date service
        $ds = $this->get('app.date');

        // Get the date range
        $weekStart = $ds->getWeekStart($date);
        $weekEnd = $ds->getWeekEnd($date);
        $days = $ds->generateDateRange($weekStart, $weekEnd);

        // Get the next and previous week
        $nextWeek = $ds->getNextWeek($date);
        $pastWeek = $ds->getPreviousWeek($date);

        // Get today link
        $todayLink = $this->generateUrl("tasks", array('date' => Carbon::now()->format('Y-m-d')));

        return $this->render('AppBundle:task:tasks.html.twig', array(
            'tasks' => $tasks,
            'nextWeek' => $nextWeek,
            'pastWeek' => $pastWeek,
            'days' => $days,
            'selected' => $date,
            'todayLink' => $todayLink,
        ));
    }

    /**
     * @Route("/task/create")
     */
    public function taskCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        // $task = $em->getRepository('AppBundle:Task')->findOneById($taskId);

        return $this->render('AppBundle:task:task_create.html.twig', array(
            // 'task' => $task
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
