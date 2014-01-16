<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16.01.14
 * Time: 23:42
 */

namespace Info\PageBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ServiceRepository extends EntityRepository {

    public function getMaxOrderValue()
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.order')
            ->orderBy('s.order', 'DESC')
            ->setMaxResults(1)
            ->getQuery();
        return $query-> getOneOrNullResult();
    }
} 