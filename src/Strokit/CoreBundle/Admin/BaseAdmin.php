<?php

namespace Strokit\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

abstract class BaseAdmin extends Admin
{

    public function getFormTheme() {
        return array_merge(parent::getFormTheme(),array('StrokitCoreBundle:Admin:form_fields.html.twig'));
    }
}
