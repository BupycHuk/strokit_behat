<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.14
 * Time: 10:51
 */

namespace Strokit\LinkBundle\DBAL;


use Strokit\CoreBundle\DBAL\EnumType;

class ServiceCategoryType extends EnumType
{
    protected $name = 'enumservicecategory';
    protected $values = array('appstore', 'socialnetwork');

    public static function getArray()
    {
        return array('appstore', 'socialnetwork');
    }
}