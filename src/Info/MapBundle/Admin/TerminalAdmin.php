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
            ->addIdentifier('name')
            ->add('address')
            ->add('number')
            ->add('active',null,array('editable' => true))
            ->add('description');
    }


    /**
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('address')
            ->add('number')
            ->add('description')
            ->add('active');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $googleMapKey = $this->getConfigurationPool()->getContainer()->getParameter('google_map_key');
        $formMapper
            ->add('location','map', array('googleMapKey' => $googleMapKey))
            ->add('active')
            ->add('name')
            ->add('address')
            ->add('number')
            ->add('description','textarea',array('required'=>false))
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
        $googleMapKey = $this->getConfigurationPool()->getContainer()->getParameter('google_map_key');
        $showMapper
            ->add('id')
            ->add('location','map', array('googleMapKey' => $googleMapKey))
            ->add('name')
            ->add('address')
            ->add('number')
            ->add('description')
            ->add('image')
        ;
    }


    public function getFormTheme() {
        return array_merge(parent::getFormTheme(),array('InfoMapBundle:Admin:Map.html.twig'));
    }
}
