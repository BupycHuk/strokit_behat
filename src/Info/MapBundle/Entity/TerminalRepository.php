<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.01.14
 * Time: 20:10
 */

namespace Info\MapBundle\Entity;


use Doctrine\ORM\EntityRepository;

class TerminalRepository extends EntityRepository {

    public function getAllMapItems()
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT t FROM InfoMapBundle:Terminal t union
            (SELECT c InfoMapBundle:Cashout c) union
            (SELECT m InfoMapBundle:Merchant m)");
        return $query;
    }
} 