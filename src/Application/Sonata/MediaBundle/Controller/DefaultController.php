<?php

namespace Application\Sonata\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $rep = $this->getDoctrine()->getRepository("ApplicationSonataMediaBundle:Media");

        $entities = $rep->createQueryBuilder('m')
            ->where('m.enabled = :enabled', 'm.context = :context')
            ->setParameters(array('enabled'=>true, 'context'=>'file'))
            ->orderBy('m.name', 'ASC')
            ->getQuery()->getResult();

        return $this->render('ApplicationSonataMediaBundle:Default:index.html.twig', array(
            "entities" => $entities
        ));
    }
}
