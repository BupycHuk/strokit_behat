<?php

namespace Info\FAQBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FaqCommentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('attr'=>array('placeholder'=>'feedback.label.email')))
            ->add('section', 'hidden',array('required'=>true))
            ->add('phone', 'text', array('required'=>true, 'attr'=>array('placeholder'=>'feedback.label.phone')))
            ->add('content', 'textarea', array('required'=>true, 'attr'=>array('placeholder'=>'feedback.label.message')))
            ->add('captcha', 'captcha', array('attr'=>array('placeholder'=>'feedback.label.captcha')))
            ->add('save', 'submit', array('label'=>'feedback.label.save'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'translation_domain' => 'InfoFeedbackBundle'
        ));

    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'info_faqbundle_faq';
    }
}
