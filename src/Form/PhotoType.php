<?php

namespace App\Form;

use App\Entity\Photo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('orientation_date')
            ->add('title')
            ->add('format')
            ->add('size')
            ->add('description')
            ->add('path')
            ->add('adding_date')
            ->add('subtitle')
            ->add('lastest_modification')
            ->add('topic')
            ->add('publicated')
            ->add('user_id')
            ->add('place_id')
            ->add('author_id')
            ->add('category_id')
            ->add('period_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
