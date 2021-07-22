<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FilmFixtures extends Fixture implements DependentFixtureInterface
{
        public const FILM_1 = 'Les Affranchis';
        public const FILM_2 = 'Parasite';
        public const FILM_3 = 'Pulp Fiction';

        private $input;

        public function __construct(Slugify $input)
        {
            $this->input = $input;
        }

    public function load(ObjectManager $manager)
    {
       // Film 1
       $film1 = new Film();
       $film1->setTitle('Les Affranchis');
       $film1->setSummary("Depuis sa plus tendre enfance, Henry Hill, né d'un père irlandais et d'une mère sicilienne, veut devenir gangster et appartenir à la Mafia. Adolescent dans les années cinquante, il commence par travailler pour le compte de Paul Cicero et voue une grande admiration pour Jimmy Conway, qui a fait du détournement de camions sa grande spécialité. Lucide et ambitieux, il contribue au casse des entrepôts de l'aéroport d'Idlewild et épouse Karen, une jeune Juive qu'il trompe régulièrement. Mais son implication dans le trafic de drogue le fera plonger...");
       $film1->setSlug($this->input->generate($film1->getTitle()));
       $film1->setPoster('https://imgr.cineserie.com/2020/06/les-affranchis-a-30-ans-pourquoi-reste-t-il-lun-des-sommets-du-film-de-gangsters.jpg?imgeng=/f_jpg/cmpr_0/w_660/h_370/m_cropbox&ver=1');
       $film1->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));

       $manager->persist($film1);

       // Film 2
       $film2 = new Film();
       $film2->setTitle('Parasite');
       $film2->setSummary("Toute la famille de Ki-taek est au chômage, et s’intéresse fortement au train de vie de la richissime famille Park. Un jour, leur fils réussit à se faire recommander pour donner des cours particuliers d’anglais chez les Park. C’est le début d’un engrenage incontrôlable, dont personne ne sortira véritablement indemne...");
       $film2->setSlug($this->input->generate($film2->getTitle()));
       $film2->setPoster('https://www.courrierinternational.com/sites/ci_master/files/styles/image_original_1280/public/assets/images/cinema_-_coree_du_sud_-_parasite_-_bong_joon-ho_-_2019.jpg?itok=-YIdiwLb');
       $film2->setContinent($this->getReference(ContinentFixtures::CONTINENT_1));


       $manager->persist($film2);

       // Film 3
       $film3 = new Film();
       $film3->setTitle('Pulp Fiction');
       $film3->setSummary("L'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s'entremêlent.");
       $film3->setSlug($this->input->generate($film3->getTitle()));
       $film3->setPoster('https://fr.web.img2.acsta.net/newsv7/19/05/22/14/37/4446591.jpg');
       $film3->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));


       $manager->persist($film3);

       $manager->flush();

        $this->addReference(self::FILM_1, $film1);
        $this->addReference(self::FILM_2, $film2);
        $this->addReference(self::FILM_3, $film3);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            BlogFixtures::class,
            ContinentFixtures::class,
        ];
    }
}
