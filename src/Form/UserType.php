<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label' => 'Adresse e-mail'))
            ->add('roles', ChoiceType::class, [
                'choices' => [
//                    'Utilisateur'   => 'ROLE_USER',
//                    'Admin'         => 'ROLE_ADMIN',
                    'Parent'        => 'ROLE_PARENT',
                    'Professeur'    => 'ROLE_TEACHER'

                ],

                'expanded' => true,
                'multiple' => true,
                'required' => true,

            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux champs doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Réecrivez le mot de passe'],
            ])
            ->add('last_name', TextType::class, array('required' => true,'label' => 'Nom'))
            ->add('first_name', TextType::class, array('required' => true, 'label' => 'Prénom'))
            ->add('tel',TelType::class, array('label' => 'Téléphone'))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
