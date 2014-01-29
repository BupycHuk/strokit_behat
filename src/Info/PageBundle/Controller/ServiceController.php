<?php

namespace Info\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServiceController extends Controller
{
    public function mainAction()
    {
        $services = $this->getDoctrine()
            ->getRepository('InfoPageBundle:Service')->findBy(array(),array('order'=>'ASC'),4);

            return $this->render('InfoPageBundle:Service:main.html.twig', array('services' => $services));
    }

    public function indexAction()
    {
        $services = $this->getDoctrine()
            ->getRepository('InfoPageBundle:Service')->findAll();

        return $this->render('InfoPageBundle:Service:index.html.twig', array('services' => $services));
    }

    public function showAction($url)
    {
        $pages = $this->getDoctrine()
            ->getRepository('InfoPageBundle:Service')
            ->findOneBy(array("url"=>$url));

        if(!$pages){
            throw $this->createNotFoundException('Page not found 404');
        }
        else
            return $this->render('InfoPageBundle:Page:page.html.twig', array('page' => $pages));
    }
}
