<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\NewsBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Sonata\NewsBundle\Form\Type\CommentType as BaseComment;

class CommentType extends BaseComment
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('attr'=>array('placeholder'=>'form.placeholder.name')))
            ->add('email', 'email', array('required' => false, 'attr'=>array('placeholder'=>'form.placeholder.email')))
            ->add('message', null, array('attr'=>array('placeholder'=>'form.placeholder.message')))
            ->add('captcha', 'captcha', array('attr'=>array('placeholder'=>'form.placeholder.captcha')))
            ->add('save', 'submit', array('label'=>'form.label.save'))
        ;
    }
}
