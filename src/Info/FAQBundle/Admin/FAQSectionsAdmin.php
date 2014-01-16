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

class FAQSectionsAdmin extends Admin{


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('name')
            ->add('image', 'sonata_type_model_list', array('required' => false, 'label' => 'Иконка'), array('link_parameters' => array('context' => 'block')))
            ;
    }
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, array('label'=>"Название раздела"))

        ;
    }
}