<?php

namespace Info\FeedbackBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class FeedbackAdmin extends Admin {

    protected $translationDomain = 'InfoFeedback1Bundle';

    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);

        if (!$this->hasRequest()) {
            $this->datagridValues = array(
                '_page' => 1,
                '_sort_order' => 'ASC', // sort direction
                '_sort_by' => 'answered' // field name
            );
        }
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('email')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('phone')
            ->add('createdAt')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'route' => array('name' => 'answer')
            ))
            ->addIdentifier('email', null, array(
                'route' => array('name' => 'answer')
            ))
            ->add('answered', null, array('label'=>"Ответили"))
            ->add('createdAt', null, array('label'=>"Дата создания"))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'answer' => array('template' => 'InfoFeedbackBundle:FeedbackAdmin:list__action_answer.html.twig'),
                )
            ))
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->add('answer');
    }
} 