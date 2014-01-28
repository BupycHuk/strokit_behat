<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:44
 */

namespace Info\PageBundle\Searcher;


use Doctrine\ORM\EntityManager;
use Info\PageBundle\Entity\Pages;
use Strokit\SearchBundle\Dto\SearchResult;
use Strokit\SearchBundle\Searcher\ISearcher;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class PageSearcher implements ISearcher{


    private $em;
    /**
     * @var
     */
    private $router;

    public function __construct(EntityManager $em,Router $router)
    {
        $this->em = $em;
        $this->router = $router;
    }

    public function find($searchText)
    {
        $results = array();
        $items = $this->em->getRepository('InfoPageBundle:Pages')
            ->createQueryBuilder('p')
            ->orWhere("p.title like :search")
            ->orWhere('p.content like :search')
            ->setParameter('search', '%' . $searchText . '%')
            ->getQuery()->getResult();

        foreach ($items as $item)
        {
            /** @var $item Pages */
            $results[] = new SearchResult($item->getTitle(),$item->getContent(),$this->router->generate('info_page', array('url' => $item->getUrl())),true);
        }
        return $results;
    }

    function getName()
    {
        return 'search.info_page';
    }
}