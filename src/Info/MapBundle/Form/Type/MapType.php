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


class MapType extends AbstractType
{

    public function getName()
    {
        return 'map';
    }


    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['guid'] = uniqid();
    }

}