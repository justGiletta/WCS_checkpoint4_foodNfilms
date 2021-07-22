<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Continent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContinentFixtures extends Fixture
{
    const CONTINENTS = [
        'Asie',
        'Europe',
        'Amérique du Nord',
        'Amérique du Sud',
        'Océanie'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CONTINENTS as $key => $continentname){
            $continent = new Continent();
            $continent->setName($continentname);
            $manager->persist($continent);
            $this->addReference('continent_' . $key, $continent);
        }
        $manager->flush();
    }
}
