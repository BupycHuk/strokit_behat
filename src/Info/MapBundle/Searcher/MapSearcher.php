<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:44
 */

namespace Info\MapBundle\Searcher;


use Doctrine\ORM\EntityManager;
use Info\MapBundle\Entity\MapBase;
use Strokit\SearchBundle\Dto\SearchResult;
use Strokit\SearchBundle\Searcher\ISearcher;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class MapSearcher implements ISearcher{


    private $em;
    /**
     * @var
     */
    private $router;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $entity;

    public function __construct(EntityManager $em,Router $router,$entity,$name)
    {
        $this->em = $em;
        $this->router = $router;
        $this->name = $name;
        $this->entity = $entity;
    }

    public function find($searchText)
    {
        $results = array();
        $items = $this->em->getRepository('InfoMapBundle:'.$this->entity)
            ->createQueryBuilder('p')
            ->orWhere("p.name like :search")
            ->orWhere('p.description like :search')
            ->orWhere('p.address like :search')
            ->orWhere('p.number like :search')
            ->orWhere('p.fax like :search')
            ->orWhere('p.email like :search')
            ->orWhere('p.url like :search')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->setParameter('search', '%' . $searchText . '%')
            ->getQuery()->getResult();

        foreach ($items as $item)
        {
            /** @var $item MapBase */
            $results[] = new SearchResult($item->getName(),$item->getAddress(),$this->router->generate('infomap_show', array('id' => $item->getId(),'entity'=>$item->getEntity())),true);
        }
        return $results;
    }

    function getName()
    {
        return $this->name;
    }
}