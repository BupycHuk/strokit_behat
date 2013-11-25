<?php

namespace Info\FAQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InfoFAQBundle:Default:index.html.twig', array('name' => $name));
    }
}
