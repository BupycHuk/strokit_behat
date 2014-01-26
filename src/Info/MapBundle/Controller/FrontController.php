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

    public function  listallAction()
    {
        $items = array_merge($this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Merchant")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Cashout")->findBy(array('active' => true)));;

        return $this->getListView(null, $items, 'infomap_all_list');
    }

    public function  mapallAction($entity)
    {
        $items = array('terminal'=>$this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active' => true)),
            'merchant'=>$this->getDoctrine()->getRepository("InfoMapBundle:Merchant")->findBy(array('active' => true)),
            'cashout'=>$this->getDoctrine()->getRepository("InfoMapBundle:Cashout")->findBy(array('active' => true)));

        return $this->getMapView($entity, $items);
    }

    public function showAction($entity,$id)
    {

        $entity = ucfirst($entity);
        $item = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->find($id);
        return $this->render('InfoMapBundle:Front:show.html.twig',
            array(
                'item'=>$item
            ));
    }

    /**
     * @param $entity
     * @param $items
     * @param $route
     * @param $link
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListView($entity, $items, $route)
    {
        $googleMapKey = $this->container->getParameter('google_map_key');
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
            'googleMapKey' => $googleMapKey
        ));
    }

    /**
     * @param $entity
     * @param $items
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getMapView($entity, $items)
    {
        $googleMapKey = $this->container->getParameter('google_map_key');


        return $this->render('InfoMapBundle:Front:map.html.twig', array(
            "items" => $items,
            'googleMapKey' => $googleMapKey,
            'entity' => $entity
        ));
    }
}