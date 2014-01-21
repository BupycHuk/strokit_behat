<?php

namespace Info\FAQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Info\FAQBundle\Entity;
use Info\FAQBundle\Entity\FaqComments;
use Info\FAQBundle\Form\FaqCommentsType;
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

            $repository = $this->getDoctrine()
                ->getRepository("InfoFAQBundle:FaqSections");
            $section = $repository->find($id);
            $entity = new FaqComments();
            $form = $this->createForm(new FaqCommentsType(), $entity);

            return $this->render('InfoFAQBundle:Default:ajax-text.html.twig', array( 'section'=>$section, "form"  => $form->createView()));
    }

    public function saveCommentAction($id,Request $request){

       if ($this->getRequest()->isXmlHttpRequest()) {
        $section = $this->getDoctrine()
            ->getRepository('InfoFAQBundle:FaqSections')
            ->find($id);

        $entity = new FaqComments();
        $form = $this->createForm(new FaqCommentsType(), $entity);
        $form->handleRequest($request);
        $entity->setSection($section);
            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em-> persist($entity);
                $em->flush();
                return new Response('<h2>Ваш комментарий отправлен</h2>');
            }
        }
        return new Response();
    }
}