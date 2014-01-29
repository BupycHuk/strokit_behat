<?php

namespace Info\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function showAction($url)
    {
        $pages = $this->getDoctrine()
            ->getRepository('InfoPageBundle:Pages')
            ->findOneBy(array("url"=>$url));

        if(!$pages){
            throw $this->createNotFoundException('Page not found 404');
        }
        else
            return $this->render('InfoPageBundle:Page:page.html.twig', array('page' => $pages));
    }
}
