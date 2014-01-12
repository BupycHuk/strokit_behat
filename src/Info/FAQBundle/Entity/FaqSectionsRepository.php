<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 10.01.14
 * Time: 22:11
 */

namespace Info\FAQBundle\Entity;

use Doctrine\ORM\EntityRepository;


class FaqSectionsRepository extends EntityRepository{

    public function getQuestionsAnswers($id){
        $repository = $this->getEntityManager()->getRepository("InfoFAQBundle:FaqQuestionsAnswers");
        return $query = $repository->createQueryBuilder('q')
            ->select('q')
            ->where('q.section=:i')
            ->setParameter('i',$id)
            ->getQuery()
            ->getResult();
    }

}