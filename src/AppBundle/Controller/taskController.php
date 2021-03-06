<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Carbon\Carbon;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;

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

        $user = $this->getUser();
        $familyId = $user->getFamily();
        $family = $em->getRepository('AppBundle:Family')->find($familyId);

        $task = new Task();

        $task->setCreated(new \DateTime());
        $task->setUpdated(new \DateTime());
        $task->setCompleted(new \DateTime());

        $form = $this->createForm(TaskType::class, $task, array('attr' => array('data-family' => $family->getId())));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('tasks');
        }


        return $this->render('AppBundle:task:task_create.html.twig', array(
            'form' => $form->createView(),
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
