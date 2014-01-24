<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.14
 * Time: 0:10
 */

namespace Strokit\CoreBundle\Menu;


use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\Request;

interface IBreadcrumbBuilder {

    function createBreadcrumbMenu(Request $request,ItemInterface $menu);

} 