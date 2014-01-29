<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:44
 */

namespace Info\FAQBundle\Searcher;


use Doctrine\ORM\EntityManager;
use Info\FAQBundle\Entity\FaqQuestionsAnswers;
use Strokit\SearchBundle\Dto\SearchResult;
use Strokit\SearchBundle\Searcher\ISearcher;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class FAQSearcher implements ISearcher{


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
        $items = $this->em->getRepository('InfoFAQBundle:FAQQuestionsAnswers')
            ->createQueryBuilder('p')
            ->orWhere("p.question like :search")
            ->orWhere('p.answer like :search')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->setParameter('search', '%' . $searchText . '%')
            ->getQuery()->getResult();

        foreach ($items as $item)
        {
            /** @var $item FAQQuestionsAnswers */
            $results[] = new SearchResult($item->getQuestion(),$item->getAnswer(),$this->router->generate('faq_ajax_get_popup', array('id' => $item->getSection()->getId())),true);
        }
        return $results;
    }

    function getName()
    {
        return 'search.info_faq';
    }
}