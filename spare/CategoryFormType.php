<?php

namespace App\Form;

use App\Entity\Category;
use App\Form\SingleCategoryFormType;
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

        
        $builder->add('wyslij',SubmitType::class)
                 ->add('name', CollectionType::class, [
                   'entry_type' => TextType::class, 
                ]);
       
       
        
        
       // $builder->add('name', EntityType::class, [
            // looks for choices from this entity
        //    'class' => Category::class,
        
            // uses the User.username property as the visible option string
        //   'choice_label' => function (Category $category)
       //    {
        //        return $category->getName();
       //    }
        
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
      //  ]);
         
      
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
