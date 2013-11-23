<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.11.13
 * Time: 2:37
 */

namespace Info\MapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MapType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            // hidden fields cannot have a required attribute
            'required'       => true,
            // Pass errors to the parent
            'error_bubbling' => true,
            'compound'       => false,
            'googleMapKey'   => 'someGoogleMapApiKey'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ($options['googleMapKey']) {
            $view->vars['googleMapKey'] = $options['googleMapKey'];
        }
    }

    public function parent()
    {
        return 'hidden';
    }

    public function getName()
    {
        return 'map';
    }

}