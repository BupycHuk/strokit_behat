<?php

namespace Info\FeedbackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FeedbackType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('attr'=>array('label'=>'Email')))
            ->add('phone', 'text', array('required'=>false))
            ->add('message', 'textarea')
            ->add('save', 'submit', array())
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'info_feedbackbundle_feedback';
    }
}
