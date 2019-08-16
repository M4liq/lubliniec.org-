<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', EntityType::class, [
            // looks for choices from this entity
            'class' => User::class,
        
            // uses the User.username property as the visible option string
           'choice_label' => 'username',
        
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ]);
       // ->add('wyslij',SubmitType::class););

            /*
              ->add('name', CollectionType::class, array(
                    'entry_type' => TextType::class,
                    'allow_add' => true,
                    'error_bubbling' => true,
                    'allow_delete' => true,
                    'empty_data' => 'John Doe',
                    'attr'         => [
                        'class' => "categories-collection",
                    ],
                ))
            */
           
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
