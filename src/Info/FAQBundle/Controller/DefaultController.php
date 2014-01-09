<?php

namespace Info\FAQBundle\Controller;

use Info\FAQBundle\Entity\FaqComments;
use Info\FAQBundle\Form\FaqCommentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository("InfoFAQBundle:FaqSections");

        $sections = $repository->findAll();
        return $this->render('InfoFAQBundle:Default:index.html.twig', array('sections'=>$sections, 'title' => "FAQ"));
    }
}
