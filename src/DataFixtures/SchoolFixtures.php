<?php

namespace App\DataFixtures;

use App\Entity\School;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SchoolFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $school = new School();
        $school->setName('Lycée René Cassin');
        $school->setAdrs('14 Avenue de Glaise');
        $school->setTel('0398215696');

        $manager->persist($school);

        $manager->flush();
    }
}



