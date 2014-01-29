<?php

namespace Info\FeedbackBundle\Controller;

use Info\FeedbackBundle\Entity\Feedback;
use Info\FeedbackBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $entity = new Feedback();
        $form = $this->createForm(new FeedbackType(), $entity);

        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->render('InfoFeedbackBundle:Default:sended.html.twig');
        }

        return $this->render('InfoFeedbackBundle:Default:index.html.twig', array(
            "form"  => $form->createView()
        ));
    }
}
