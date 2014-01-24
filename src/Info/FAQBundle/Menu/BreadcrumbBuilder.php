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

    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createBreadcrumbMenu(Request $request,ItemInterface $menu)
    {
        switch($request->get('_route')){
            case 'info_faq':
                $menu
                    ->addChild('faq.title')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'InfoFAQBundle')
                ;
        }
    }

} 