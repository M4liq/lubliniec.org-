<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\ArticleSection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('subtitle')
            ->add('orientation_date')
            ->add('date', DateType::class,[
                'label' => 'Data',
                'widget' => 'single_text'
            ])
            ->add('topic')
            ->add('publicated')
            ->add('author_id')
            ->add('category_id')
            ->add('place_id')
            ->add('period_id')
            ->add('article_section_id', CollectionType::class,[
                'entry_type' => ArticleSectionType::class,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'entry_options' =>[
                    'label' => false
                ]

            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
