<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FamilyController extends Controller
{
    /**
     * @Route("/family")
     */
    public function familyAction()
    {
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
