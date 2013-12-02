<?php

namespace Info\FAQBundle\Controller;

use Info\FAQBundle\Entity\FaqComments;
use Info\FeedbackBundle\Form\FaqCommentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $entity = new FaqComments();
        $form = $this->createForm(new FaqCommentsType(), $entity);

        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $this->render('InfoFAQBundle:Default:index.html.twig', array(
            "form"  => $form->createView()
        ));
    }
}
