<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 29.11.13
 * Time: 23:54
 */

namespace Info\FAQBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class FAQCommentsAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('email')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'route' => array('name' => 'answer')
            ))
            ->addIdentifier('email', null, array(
                'route' => array('name' => 'answer')
            ))
            ->add('section',null, array('label' => 'Раздел'))
            ->add('content', null, array('label'=>"Комментарий"))
            ->add('answer', null, array('label'=>"Ответ"))
            ->add('answered', 'boolean', array('editable' => true,'label'=>"Ответили"))
            ->add('active', 'boolean', array('editable' => true,'label' => 'Активен'))
            ->add('date',null, array('label' => "Дата создания"))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'answer' => array('template' => 'InfoFAQBundle:FaqAdmin:list__action_comment.html.twig'),
                    'delete' => array()
                )
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('active')
            ->add('answered')
            ->add('email')
            ->add('section')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->add('answer');
    }
} 