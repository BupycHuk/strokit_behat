<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 29.11.13
 * Time: 22:19
 */

namespace Info\FAQBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class FAQQuestionsAnswersAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('question', null, array('label' => "Вопросы"))
            ->add('answer', null, array('label' => 'Ответы'))
            ->add('active', null, array('label' => 'Активен'))
            ->add('section', null, array('label' => 'Разделы'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('question', null, array('label' => "Вопросы"))
            ->addIdentifier('answer', null, array('label' => 'Ответы'))
            ->add('active', 'boolean', array('editable' => true,'label' => 'Активен'))
            ->add('section', null, array('label' => 'Разделы'))

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('active')
            ->add('section')
        ;
    }


} 