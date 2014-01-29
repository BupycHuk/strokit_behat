<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.12.13
 * Time: 20:27
 */

namespace Info\MapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FrontController extends Controller {

    public function  listallAction()
    {
        $items = array_merge($this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Merchant")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Cashout")->findBy(array('active' => true)));


        $itemsCount = $this->container->getParameter('infomap_items_in_list');

        $paginator = $this->get('knp_paginator');

        $pagination = $paginator
            ->paginate($items,
                $this->get('request')->query->get('page', 1),
                $itemsCount);

        $pagination->setUsedRoute($route);

        return $this->render('InfoMapBundle:Front:list.html.twig', array(
            "items" => $pagination,
            'translationDomain' => sprintf('InfoMap%sBundle', $entity),
        ));
    }

    public function  mapallAction($entity)
    {
        $items = array('terminal','cashout','merchant');

        return $this->render('InfoMapBundle:Front:map.html.twig', array(
            "entitytypes" => $items,
            'entity' => $entity
        ));
    }

    public function  mapjsAction($entity)
    {
        $items = array('terminal'=>$this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active' => true)),
            'cashout'=>$this->getDoctrine()->getRepository("InfoMapBundle:Cashout")->findBy(array('active' => true)),
            'merchant'=>$this->getDoctrine()->getRepository("InfoMapBundle:Merchant")->findBy(array('active' => true)));

        return $this->render('InfoMapBundle:Front:mapScript.js.twig', array(
            "items" => $items,
            'entity' => $entity
        ));
    }

    public function showAction($entity,$id)
    {

        $entity = ucfirst($entity);
        $item = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->find($id);

        if (!$item)
            $this->createNotFoundException();

        return $this->render('InfoMapBundle:Front:show.html.twig',
            array(
                'item'=>$item
            ));
    }
}