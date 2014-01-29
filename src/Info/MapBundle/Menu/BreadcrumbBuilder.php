<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Info\MapBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Strokit\CoreBundle\Menu\IBreadcrumbBuilder;
use Symfony\Component\HttpFoundation\Request;

class BreadcrumbBuilder implements IBreadcrumbBuilder {


    public function createBreadcrumbMenu(Request $request,ItemInterface $menu)
    {
        switch($request->get('_route')){
            case 'infomap_all_list':
                $menu
                    ->addChild('list.title')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'InfoMapBundle')
                ;
                return true;
            case 'infomap_all_map':
                $menu
                    ->addChild('map.title')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'InfoMapBundle')
                ;
                return true;
            default:
                return false;
        }
    }

} 