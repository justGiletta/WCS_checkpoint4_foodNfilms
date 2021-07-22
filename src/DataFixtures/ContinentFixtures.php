<?php

namespace App\DataFixtures;

use App\Entity\Continent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ContinentFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONTINENT_1 = 'Asie';
    public const CONTINENT_2 = 'Europe';
    public const CONTINENT_3 = 'Amérique du Nord';

    public function load(ObjectManager $manager)
    {
        // continent 1
        $continent1 = new Continent();
        $continent1->setName('Asie');

        $manager->persist($continent1);
        // continent 2
        $continent2 = new Continent();
        $continent2->setName('Europe');

        $manager->persist($continent2);
        // continent 3
        $continent3 = new Continent();
        $continent3->setName('Amérique du Nord');

        $manager->persist($continent3);
        // continent 4
        $continent4 = new Continent();
        $continent4->setName('Amérique du Sud');

        $manager->persist($continent4);
        // continent 5
        $continent5 = new Continent();
        $continent5->setName('Océanie');

        $manager->persist($continent5);

        $manager->flush();

        $this->addReference(self::CONTINENT_1, $continent1);
        $this->addReference(self::CONTINENT_2, $continent2);
        $this->addReference(self::CONTINENT_3, $continent3);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            BlogFixtures::class,
        ];
    }
}
