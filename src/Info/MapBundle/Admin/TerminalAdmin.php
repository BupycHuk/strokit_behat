<?php

namespace Info\MapBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Provider\Pool;

class TerminalAdmin extends Admin
{

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('address')
            ->add('description');
    }


    /**
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('address')
            ->add('description')
            ->add('id');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('location','map', array('googleMapKey' => "AIzaSyBzZmU7d-k1MOBBKGHrer-y4ssG4Dgvb7E"))
            ->add('address')
            ->add('description')
            ->add('image', 'sonata_type_model_list', array('required' => false), array(
                'link_parameters' => array('context'=>'map')
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('location','map')
            ->add('address')
            ->add('description')
        ;
    }


    public function getFormTheme() {
        return array_merge(parent::getFormTheme(),array('InfoMapBundle:Admin:Map.html.twig'));
    }
}
