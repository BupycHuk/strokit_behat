<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Strokit\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class BreadcrumbBuilder {

    private $breadcrumbBuilders;
    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $factory;
    /**
     * @var
     */
    private $homeRoute;

    public function __construct($breadcrumbBuilders,FactoryInterface $factory,$homeRoute)
    {

        $this->breadcrumbBuilders = $breadcrumbBuilders;
        $this->factory = $factory;
        $this->homeRoute = $homeRoute;
    }

    public function createBreadcrumbMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        // this item will always be displayed
        $menu->addChild('home', array('route' => $this->homeRoute))
            ->setExtra('translation_domain', 'InfoElsomBundle');


        foreach($this->breadcrumbBuilders as $breadcrumbBuilder)
        {
            if ($breadcrumbBuilder instanceof IBreadcrumbBuilder)
            {
                if ($breadcrumbBuilder->createBreadcrumbMenu($request,$menu))
                    return $menu;
            }
        }
        return $menu;
        //throw new \InvalidArgumentException('breadcrumb.route.not_found');
    }

} 