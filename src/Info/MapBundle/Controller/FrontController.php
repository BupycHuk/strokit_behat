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
        $entity = ucfirst($entity);
        $items = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->findBy(array('active'=>true));

        $link = $this->generateUrl('infomap_map',array('entity'=>strtolower($entity)));
        return $this->getListView($entity, $items, 'infomap_list', $link);
    }

    public function  mapAction($entity)
    {
        $entity = ucfirst($entity);
        $items = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",strtolower($entity)))->findBy(array('active'=>true));

        $link = $this->generateUrl('infomap_list',array('entity'=>strtolower($entity)));
        return $this->getMapView($entity, $items, $link);
    }

    public function  listallAction()
    {
        $items = $this->getAllItems();

        $link = $this->generateUrl('infomap_all_map');
        return $this->getListView(null, $items, 'infomap_all_list', $link);
    }

    public function  mapallAction()
    {
        $items = $this->getAllItems();

        $link = $this->generateUrl('infomap_all_list');
        return $this->getMapView(null, $items, $link);
    }

    public function showAction($entity,$id)
    {
        $entity = ucfirst($entity);
        $item = $this->getDoctrine()->getRepository(sprintf("InfoMapBundle:%s",$entity))->find($id);
        return $this->render('InfoMapBundle:Front:show.html.twig',array('item'=>$item));
    }

    /**
     * @param $entity
     * @param $items
     * @param $route
     * @param $link
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListView($entity, $items, $route, $link)
    {
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
            'link' => $link
        ));
    }

    /**
     * @param $entity
     * @param $items
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getMapView($entity, $items, $link)
    {
        $googleMapKey = $this->container->getParameter('google_map_key');


        return $this->render('InfoMapBundle:Front:map.html.twig', array(
            "items" => $items,
            'googleMapKey' => $googleMapKey,
            'translationDomain' => sprintf('InfoMap%sBundle', $entity),
            'link' => $link
        ));
    }

    /**
     * @return array
     */
    private function getAllItems()
    {
        $items = array_merge($this->getDoctrine()->getRepository("InfoMapBundle:Terminal")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Merchant")->findBy(array('active' => true)),
            $this->getDoctrine()->getRepository("InfoMapBundle:Cashout")->findBy(array('active' => true)));
        return $items;
    }

} 