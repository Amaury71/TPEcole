<?php

namespace App\Form;

use App\Entity\Child;
use App\Entity\PhotoClass;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoClassType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('date')
            ->add('fileName')
            ->add('imageFile' , FileType::class, [
                'required' => false
            ])

            ->add('children')



            ;

//        ->add('Children', EntityType::class, array(
//        'class'   => Child::class,
//        'choice_label' => 'last_name',
//
//        'multiple' => true,
//        'required' => false,
//
//
//        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PhotoClass::class,
        ]);
    }
}
