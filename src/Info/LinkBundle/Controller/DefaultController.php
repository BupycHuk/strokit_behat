<?php

namespace Info\LinkBundle\Controller;

use Info\LinkBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showLinksWithClassAction($serviceCategory)
    {
        $links = $this->getDoctrine()->getRepository('InfoLinkBundle:Link')->findAllByServiceCategory($serviceCategory);
        return $this->render('InfoLinkBundle:Front:social.html.twig',array('links'=>$links));
    }

    public function showLinksWithImageAction($serviceCategory)
    {
        $links = $this->getDoctrine()->getRepository('InfoLinkBundle:Link')->findAllByServiceCategory($serviceCategory);
        return $this->render('InfoLinkBundle:Front:appstore.html.twig',array('links'=>$links));
    }
}
