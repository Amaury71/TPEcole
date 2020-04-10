<?php

namespace App\Form;

use App\Entity\Child;
use App\Entity\PhotoClass;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('last_name')
            ->add('first_name')
            ->add('age')
            ->add('class')
            ->add('validationInscription')
            ->add('photoClass')


//            ->add('PhotoClass', EntityType::class, array(
//                'class'   => PhotoClass::class,
//                'choice_label' => 'name',
//
//                'multiple' => true,
//
//            ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
