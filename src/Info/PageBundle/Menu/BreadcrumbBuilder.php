<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Info\PageBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Strokit\CoreBundle\Menu\IBreadcrumbBuilder;
use Symfony\Component\HttpFoundation\Request;

class BreadcrumbBuilder implements IBreadcrumbBuilder {

    public function createBreadcrumbMenu(Request $request,ItemInterface $menu)
    {
        switch($request->get('_route')){
            case 'info_service_index':
                $menu
                    ->addChild('service.title')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'InfoPageBundle')
                ;
                return true;
            default:
                return false;
        }
    }

} 