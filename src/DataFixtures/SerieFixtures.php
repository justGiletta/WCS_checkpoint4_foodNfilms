<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SerieFixtures extends Fixture implements DependentFixtureInterface
{
    public const SERIE_1 = 'Friends';
    public const SERIE_2 = 'Les tortues ninjas';
    public const SERIE_3 = 'Dexter';

    private $input;

    public function __construct(Slugify $input)
    {
        $this->input = $input;
    }

    public function load(ObjectManager $manager)
    {
       // Serie 1
       $serie1 = new Serie();
       $serie1->setTitle('Friends');
       $serie1->setSummary("S9.E5 Celui qui s'est fait piquer son sandwich
       Joey est toujours le seul à savoir que Monica et Chandler sortent ensemble. Ce secret n'est pourtant pas facile à garder : pour preuve, Phoebe vient de trouver un caleçon coincé dans les coussins du canapé de Monica et Rachel.");
       $serie1->setSlug($this->input->generate($serie1->getTitle()));
       $serie1->setPoster('https://lh3.googleusercontent.com/mv2QvrIgbIbrWDmngx7NX9LD162LxQrVuqJUp3GYqEA33GGnWKcV1wkZctW20EpR8-8z=s142');
       $serie1->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));

       $manager->persist($serie1);

       // Serie 2
       $serie2 = new Serie();
       $serie2->setTitle('Les tortues ninjas');
       $serie2->setSummary("Tortues Ninja : Les Chevaliers d'écaille (Teenage Mutant Ninja Turtles) est une série télévisée d'animation franco-américaine en 193 épisodes de 25 minutes, d'après le comic créé par Kevin Eastman et Peter Laird, et diffusée du 10 décembre 1987 au 26 septembre 1990 en syndication puis du 8 septembre 1990 au 2 novembre 1996 sur le réseau CBS. À partir de la deuxième saison Jack Mendelsohn est responsable éditorial de la série1.");
       $serie2->setSlug($this->input->generate($serie2->getTitle()));
       $serie2->setPoster('https://lh3.googleusercontent.com/r_PQXRR5RG5Zno-B8J6kvLhRnAeVV-gykbRD7EnmWV727K36HFh1QTyA7eQT_Uh6_gmY-g=s151');
       $serie2->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));


       $manager->persist($serie2);

       // Serie 3
       $serie3 = new Serie();
       $serie3->setTitle('Dexter');
       $serie3->setSummary("De jour, l'avenant Dexter est expert médico-légal en analyse de traces de sang pour la police de Miami. De nuit, c'est un tueur en série qui s'attaque aux meurtriers.");
       $serie3->setSlug($this->input->generate($serie3->getTitle()));
       $serie3->setPoster('https://lh3.googleusercontent.com/g3dYwb2RPUR2lIICHTTvquJeu4YKHE5y0eHKbakR_gYIBX6FvvtiXPfoR8qFjHRhQyXhPQ=s152');
       $serie3->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));


       $manager->persist($serie3);

       $manager->flush();

       $this->addReference(self::SERIE_1, $serie1);
        $this->addReference(self::SERIE_2, $serie2);
        $this->addReference(self::SERIE_3, $serie3);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            BlogFixtures::class,
            ContinentFixtures::class,
            FilmFixtures::class,
        ];
    }
}
