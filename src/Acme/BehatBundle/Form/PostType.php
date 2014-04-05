<?php
/**
 * Created by PhpStorm.
 * User: bupychuk
 * Date: 29.03.14
 * Time: 18:00
 */

namespace Acme\BehatBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,array('required'=>true))
            ->add('content',null,array('required'=>true))
            ->add('submit','submit');
    }

    public function getName()
    {
        return 'post_type';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class'=>'Acme\BehatBundle\Entity\Post'));
    }
}