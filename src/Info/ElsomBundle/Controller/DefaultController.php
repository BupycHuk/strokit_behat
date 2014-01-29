<?php

namespace Info\ElsomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InfoElsomBundle:Default:index.html.twig');
    }
}
