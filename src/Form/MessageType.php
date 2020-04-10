<?php

namespace App\Form;

use App\Entity\Message;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('msg')


            ->add('receiveMsg', EntityType::class, array(
                'class' => User::class,
                'query_builder' => function(EntityRepository $er) {
                    $role = "ROLE_TEACHER";
                    return $er->createQueryBuilder('u')
                        ->Where('u.roles LIKE :role')
                        ->setParameter('role', '%' .$role. '%');
                }
            ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
