<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.12.13
 * Time: 20:27
 */

namespace Info\MapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller {


    public function  listAction($entity)
    {
        $items = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->findBy(array('active'=>true));


        $paginator = $this->get('knp_paginator');

        $pagination = $paginator
            ->paginate($items,
                $this->get('request')->query->get('page',1),
            1);

        $pagination->setUsedRoute('infomap_list');

        return $this->render('InfoMapBundle:Front:list.html.twig', array(
            "items"  => $pagination,
            'translationDomain' => sprintf('InfoMap%sBundle',$entity),
            'entity' => $entity
        ));
    }

    public function  mapAction($entity)
    {
        $items = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->findBy(array('active'=>true));

        $googleMapKey = $this->container->getParameter('google_map_key');


        return $this->render('InfoMapBundle:Front:map.html.twig', array(
            "items"  => $items,
            'googleMapKey' => $googleMapKey,
            'translationDomain' => sprintf('InfoMap%sBundle',$entity),
            'entity' => $entity
        ));
    }

    public function showAction($id)
    {
        //TODO: запустить логику
        return $this->render('InfoMapBundle:Front:show.html.twig');
    }

} 