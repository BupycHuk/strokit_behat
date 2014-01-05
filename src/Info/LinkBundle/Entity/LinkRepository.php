<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.01.14
 * Time: 20:10
 */

namespace Info\LinkBundle\Entity;


use Doctrine\ORM\EntityRepository;

class LinkRepository extends EntityRepository {

    public function findAllByServiceCategory($serviceCategory)
    {
        $query = $this->createQueryBuilder('l')
            ->innerJoin("InfoLinkBundle:Service", 's', 'WITH', 'l.service = s.id')
            ->where('s.category = :serviceCategory')
            ->andWhere('s.active = :serviceactive')
            ->andWhere('l.active = :linkactive')
            ->setParameters(array('serviceCategory' => $serviceCategory
            , 'serviceactive' => true
            , 'linkactive' => true
            ))
            ->orderBy('s.name', 'ASC')
            ->getQuery();
        return $query->getResult();
    }
} 