<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.12.13
 * Time: 20:27
 */

namespace Info\MapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TerminalController extends Controller {


    public function  indexAction()
    {
        $terminals = $this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active'=>true));
        $googleMapKey = $this->container->getParameter('google_map_key');
        return $this->render('InfoMapBundle:Front:index.html.twig', array(
            "terminals"  => $terminals,'googleMapKey' => $googleMapKey
        ));

    }

} 