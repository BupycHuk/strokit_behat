<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Application\Sonata\NewsBundle\Menu;

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
            case 'sonata_news_archive_monthly':
                $menu
                    ->addChild('title_archive_monthly')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'SonataNewsBundle')
                ;
                return true;
            case 'sonata_news_archive_yearly':
                $menu
                    ->addChild('title_archive_yearly')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'SonataNewsBundle')
                ;
                return true;
            case 'sonata_news_archive':
                $menu
                    ->addChild('title_news')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'SonataNewsBundle')
                ;
                return true;
            case 'sonata_news_home':
                $menu
                    ->addChild('title_news')
                    ->setCurrent(true)
                    ->setExtra('translation_domain', 'SonataNewsBundle')
                ;
                return true;
            default:
                return false;
        }
    }

} 