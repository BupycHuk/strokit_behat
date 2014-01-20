<?php

namespace Info\PageBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Info\PageBundle\Entity\ServiceRepository;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Strokit\CoreBundle\Admin\BaseAdmin;

class ServiceAdmin extends BaseAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'order'
    );

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('url')
            ->add('title')
            ->add('content')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Страница')
            ->add('url')
            ->add('title')
            ->add('image', 'sonata_type_model_list', array('required' => true), array(
                'link_parameters' => array('context'=>'block')
            ))
            ->add('content', 'ckeditor', array('attr' => array('class' => 'span10', 'rows' => 20), 'config_name' => 'cke_config'))
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('url')
            ->add('title')
            ->add('order','sortable',array('editable'=>true))
        ;
    }

    public function prePersist($object)
    {
        /** @var $repository ServiceRepository */
        $repository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository($this->getClass());
        $maxOrderValue = $repository->getMaxOrderValue();
        $value = $maxOrderValue['order'] + 1;
        $object->setOrder($value);
    }
}