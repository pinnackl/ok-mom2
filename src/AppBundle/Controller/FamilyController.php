<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FamilyController extends Controller
{
    /**
     * @Route("/family", name="family")
     */
    public function familyAction()
    {
        $em = $this->getDoctrine()->getManager();

        // $family = $em->getRepository('AppBundle:Family')->find();

        return $this->render('AppBundle:Family:family.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/family/create")
     */
    public function createAction()
    {
        return $this->render('AppBundle:Family:create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/family/invite")
     */
    public function inviteAction()
    {
        return $this->render('AppBundle:Family:invite.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/family/edit")
     */
    public function editAction()
    {
        return $this->render('AppBundle:Family:edit.html.twig', array(
            // ...
        ));
    }

}
