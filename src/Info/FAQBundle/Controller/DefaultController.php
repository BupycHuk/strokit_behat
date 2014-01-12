<?php

namespace Info\FAQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Info\FAQBundle\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(){
        $repository = $this->getDoctrine()
            ->getRepository("InfoFAQBundle:FaqSections");

        $sections = $repository->findAll();
        return $this->render('InfoFAQBundle:Default:index.html.twig', array('sections'=>$sections, 'title' => "FAQ"));
    }

    public function showFaqPopupAction($id){

       if($this->getRequest()->isXmlHttpRequest()){
            $repository = $this->getDoctrine()
                ->getRepository("InfoFAQBundle:FaqSections");

            $questions_answers = $repository->getQuestionsAnswers($id);
            return $this->render('InfoFAQBundle:Default:ajax-text.html.twig', array('questions_answers'=>$questions_answers));
         }
        return new Response();
    }
}
