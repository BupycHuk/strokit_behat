<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.11.13
 * Time: 2:37
 */

namespace Info\MapBundle\Type;

use Symfony\Component\Form\AbstractType;


class MapType extends AbstractType
{

    public function getParent()
    {
        return 'integer';
    }

    public function getName()
    {
        return 'mapfield';
    }

}