<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Info\FaqBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Strokit\CoreBundle\Menu\IBreadcrumbBuilder;
use Symfony\Component\HttpFoundation\Request;

class BreadcrumbBuilder implements IBreadcrumbBuilder {


    public function createBreadcrumbMenu(Request $request,ItemInterface $menu)
    {
        echo 'faqBreadCrumb';
        switch($request->get('_route')){
            case 'info_faq':
                echo 'faqBreadCrumb2';
                $menu
                    ->addChild('faq.title')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'InfoFAQBundle')
                ;
                return true;
            default:
                return false;
        }
    }

} 