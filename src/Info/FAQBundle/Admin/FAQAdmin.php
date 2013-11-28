<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/25/13
 * Time: 3:29 PM
 */

namespace Info\FAQBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class FAQAdmin extends Admin{

    protected $translationDomain = 'InfoFAQ1Bundle';
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
        ;
    }
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name', null, array('label'=>"Название раздела"))
        ;
    }


}