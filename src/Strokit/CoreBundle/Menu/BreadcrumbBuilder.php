<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Strokit\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class BreadcrumbBuilder
{

//    private $breadcrumbBuilders;
    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $factory;
    /**
     * @var
     */
    private $homeRoute;
    private $container;

    public function __construct(
        Container $container,
//        $breadcrumbBuilders,
        FactoryInterface $factory,
        $homeRoute)
    {

//        $this->breadcrumbBuilders = $breadcrumbBuilders;
        $this->factory = $factory;
        $this->homeRoute = $homeRoute;
        $this->container = $container;
    }

    public function createBreadcrumbMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        // this item will always be displayed
        $menu->addChild('home', array('route' => $this->homeRoute))
            ->setExtra('translation_domain', 'InfoElsomBundle');

        echo 'test1';

        // - [@infofaq_breadcrumb, @infomap_breadcrumb, @infopage_breadcrumb, @sonata.news.breadcrumb, @infofeedback_breadcrumb]
        $faqBreadcrumbBuilder = new \Info\FaqBundle\Menu\BreadcrumbBuilder();
        if ($faqBreadcrumbBuilder->createBreadcrumbMenu($request, $menu))
            return $menu;
        echo 'test2';
        if ($this->container->get('infopage_breadcrumb')->createBreadcrumbMenu($request, $menu))
            return $menu;
        echo 'test3';
        if ($this->container->get('infomap_breadcrumb')->createBreadcrumbMenu($request, $menu))
            return $menu;
        echo 'test4';
        if ($this->container->get('sonata.news.breadcrumb')->createBreadcrumbMenu($request, $menu))
            return $menu;
        echo 'test5';
        if ($this->container->get('infofeedback_breadcrumb')->createBreadcrumbMenu($request, $menu))
            return $menu;
        return $menu;
        //throw new \InvalidArgumentException('breadcrumb.route.not_found');
    }

} 