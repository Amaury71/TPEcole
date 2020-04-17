<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@symfony.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'A'));
        $user->setRoles(array('ROLE_PARENT'));
        $user->setLastName('Geoffrey');
        $user->setFirstName('Jean');
        $user->setTel('0684796325');
        $manager->persist($user);

        $manager->flush();



        $user2 = new User();
        $user2->setEmail('admin@symfony.com');
        $user2->setPassword($this->passwordEncoder->encodePassword($user,'admin'));
        $user2->setRoles(array('ROLE_ADMIN'));
        $user2->setLastName('Samuelo');
        $user2->setFirstName('Antony');
        $user2->setTel('0695633223');
        $manager->persist($user2);

        $manager->flush();


    }
}
