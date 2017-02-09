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

        $user = $this->getUser();
        $familyId = $user->getFamily();

        $family = $em->getRepository('AppBundle:Family')->find($familyId);

        $familyMember = $em->getRepository('AppBundle:User')->findByFamily($familyId);

        $url = $url = $this->generateUrl('invite_family');

        return $this->render('AppBundle:Family:family.html.twig', array(
            'family' => $family,
            'familyMember' => $familyMember,
            'inviteAction' => $url,
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
     * @Route("/family/invite", name="invite_family")
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
