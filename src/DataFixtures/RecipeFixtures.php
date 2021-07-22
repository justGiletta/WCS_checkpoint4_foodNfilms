<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Recipe;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public const RECIPE_1 = 'Les pâtes à la sauce tomate des Affranchis';
    public const RECIPE_2 = 'Le Jjapaguri de Parasite';
    public const RECIPE_3 = 'Le Kahuna Burger de Pulp Fiction';
    public const RECIPE_4 = 'Le sandwich de Thanksgiving de Ross';
    public const RECIPE_5 = 'La pizza Pepperoni Marshmallox des Tortues Ninja';
    public const RECIPE_6 = 'Les muffins aux œufs et bacon de Dexter';

    private $input;

    public function __construct(Slugify $input)
    {
        $this->input = $input;
    }

    public function load(ObjectManager $manager)
    {
       // Recette 1
       $recipe1 = new Recipe();
       $recipe1->setTitle('Les pâtes à la sauce tomate des Affranchis');
       $recipe1->setDescription("Pour 4 personnes
       Préparation : 20-30 minutes
       Cuisson : 2h30-3h. Plus ça mijote, meilleur c’est.
       
       INGRÉDIENTS :
       - 70g de chair à saucisse
       - 170g de veau haché
       - 170g de boeuf haché
       - 2.4kg de tomates pelées
       - 900g de sauce tomate naturelle
       - 15cl de concentré de tomates
       - 25g de miettes de pain frais pour ajouter de la consistance
       - 6cl de lait
       - 1 gros oeuf
       - 50g de parmesan râpé
       - 2 carottes
       - 1 pomme de terre
       - 50cl d’eau
       - 2 cuillères à soupe d’huile d’olive
       - 5 cuillères à soupe de basilic frais haché
       - 5 cuillères à soupe de persil plat frais haché
       - 3 gousses d’ail
       - 3 gros oignons
       - Une pointe de tabasco ou piment de cayenne
       - Sel et poivre du moulin
        
       Dans une marmite ou grand plat en fonte pour boeuf bourguignon, faire dorer l’oignon épluché et ciselé dans l’huile d’olive pendant 5 minutes en remuant de temps en temps. 
       Dans un mixeur ou à la main, mélanger les tomates et la sauce tomate au naturel.  
       Dans la marmite, ajouter l’eau, le concentré de tomates, l’ail finement ciselé, les carottes et la pomme de terre entières, 3 cuillères à soupe de basilic haché et 3 cuillères à soupe de persil plat haché. Saler, poivrer et pimenter. 
       Porter à ébullition, puis réduire à frémissement (feu faible). Cuire pendant 30 minutes à demi couvert, en remuant de temps en temps. 
       Dans un bol, détremper les miettes de pain dans le lait pendant quelques secondes à peine. Les verser dans un grand récipient avec toute la viande (sous forme de boulettes ou simplement en morceaux), l’oeuf, le parmesan râpé, le reste de basilic et de persil. Saler et pimenter. Ajouter 15 cl de sauce. 
       Peu à peu, émietter la viande à la spatule tout en incorporant la sauce tomate. Couvrir à demi et laisser frémir pendant 1 heure minimum. Mélanger régulièrement et donner quelques tours de moulin à poivre.
       Avant de servir, retirer les carottes et la pomme de terre. Servir sur les pâtes : environ 50 cl de sauce pour 500 g de pâtes. Et s’il en reste, laisser refroidir la préparation à température ambiante, puis faire réchauffer le lendemain pour un résultat encore plus savoureux.");
       $recipe1->setSlug($this->input->generate($recipe1->getTitle()));
       $recipe1->setPoster('http://www.parisfaitsoncinema.com/cache/media/goodfellas-affranchis-pasta-sauce-italie-scorsese-cinema-cuisine-cookery/cr%2C640%2C450-54c618.jpg');
       $recipe1->setContinent($this->getReference(ContinentFixtures::CONTINENT_2));
       $recipe1->setFilm($this->getReference(FilmFixtures::FILM_1));

       $manager->persist($recipe1);

       // Recette 2
       $recipe2 = new Recipe();
       $recipe2->setTitle('Le Jjapaguri de Parasite');
       $recipe2->setDescription("Ingrédients
       1 paquet de nouilles instantanées Jjapaghetti (ou chapaghetti)
       1 paquet de nouilles instantanées Neoguri
       1 l d’eau
       200 g de faux filet de bœuf coupé en dés
       Sel et poivre
       1 càs d’huile
       
       Préparation
       1. Dans une poêle chaude huilée, faire dorer les morceaux de bœuf pendant quelques minutes. Assaisonner de sel et de poivre. Réserver.
       2. Porter l’eau à ébullition. Ajouter les nouilles Jjapaghetti, Neoguri et leurs paquets de légumes déshydratés respectifs. Cuire pendant 2 à 3 minutes, selons les instructions du paquet.
       3. Egoutter les nouilles en laissant environ 10 cl d’eau, puis les transférer dans une poêle. Ajouter la poudre d’épice et l’huile des Jjapaghetti ainsi que 1/3 de la poudre d’épices des Neoguri. Bien mélanger. Ajouter les morceaux de bœuf et bien mélanger. Laisser caraméliser quelques secondes.
       4. Disposer les nouilles dans un bol et parsemer de quelques ciboules ciselées.");
       $recipe2->setSlug($this->input->generate($recipe2->getTitle()));
       $recipe2->setPoster('https://lh3.googleusercontent.com/MOh17gDZDZj1YKhMvYcOYqSZORXrrb95e1yOYwiVQX32El6scqMLzCtw_xqgj3ItafynuQ=s162');
       $recipe2->setContinent($this->getReference(ContinentFixtures::CONTINENT_1));
       $recipe2->setFilm($this->getReference(FilmFixtures::FILM_2));


       $manager->persist($recipe2);

       // Recette 3
       $recipe3 = new Recipe();
       $recipe3->setTitle('Le Kahuna Burger de Pulp Fiction');
       $recipe3->setDescription("Ingrédients :
       4 pains à burger
       Tranches de Cheddar
       4 steaks hachés
       Ananas en tranche
       Ketchup
       Sauce Teriyaki
       4 feuilles de salade
       4 rondelles de tomate
       Beurre
       2 oignons rouges
       Sel et poivre
       Étapes :
       Préchauffer le four à 160°C.
       Éplucher et tailler en tranches fines l’ananas et les oignons rouges.
       Par la suite, laver les tomates et les couper aussi en fines tranches.
       Faire fondre le beurre dans une poêle, puis faire revenir les oignons. Une fois légèrement confits, les réserver.
       Faire colorer l’ananas à la poêle, puis les réserver.
       Une fois le four chaud, déposer le pain à burger coupé en deux sur une plaque de cuisson. Mettre une tranche de cheddar sur les bases uniquement, donc sur la moitié des pains.
       Mettre un peu de ketchup et ajouter les oignons, un peu de salade et une tranche de tomate.
       Une fois le fromage fondu et les pains légèrement grillés, poser les steaks préalablement cuits sur la partie basse de votre burger.
       Ajouter deux tranches d’ananas.
       Sur les pains sans fromage, déposer de la sauce teriyaki. Et maintenant il ne reste plus qu’a refermer le burger !");
       $recipe3->setSlug($this->input->generate($recipe3->getTitle()));
       $recipe3->setPoster('https://lh3.googleusercontent.com/sJYC0MeLysMAR-_6l5sJIWQjwgJ0NKVj9q-cRVe7mEgvVCcIAviZpHi32zpaVpJNNHq_pw=s152');
       $recipe3->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));
       $recipe3->setFilm($this->getReference(FilmFixtures::FILM_3));

       $manager->persist($recipe3);

       // Recette 4
       $recipe4 = new Recipe();
       $recipe4->setTitle('Le sandwich de Thanksgiving de Ross');
       $recipe4->setDescription("Ingrédients :
       3 tranches de pain de mie
       Mayonnaise (facultatif)
       1 laitue romaine
       70 g de tranches de dinde
       160 g de restes de farce au pain de maïs
       60 ml de sauce brune
       60 ml de sauce à la canneberge en boîte
       Sel et poivre
       
       Déroulé : 
       1- Posez une tranche de pain. Étalez une couche uniforme de mayonnaise (si souhaité), puis ajoutez une ou deux feuilles de laitue
       2- Versez la sauce brune dans un plat peu profond. Trempez une seconde tranche de pain dans la sauce, des deux côtés. Posez la tranche sur le sandwich.
       3- Ajoutez une ou deux autres feuilles de laitue, le reste de la dinde, déposer la dernière tranche de pain. Utilisez un grand cure-dents pour maintenir le tout.");
       $recipe4->setSlug($this->input->generate($recipe4->getTitle()));
       $recipe4->setPoster('https://lh3.googleusercontent.com/b4W-ChxZo5SGbXzE-eh48dptoAJ5lSEgs4j452xK4dPvt1wI5CctTSKTt-jC2m6QqB80DQ=s129');
       $recipe4->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));
       $recipe4->setSerie($this->getReference(SerieFixtures::SERIE_1));

       $manager->persist($recipe4);

       // Recette 5
       $recipe5 = new Recipe();
       $recipe5->setTitle('La pizza Pepperoni Marshmallox des Tortues Ninja');
       $recipe5->setDescription("Ingrédients :
       1 pâte à pizza ronde (achetée ou faite maison)
       10 tranches de salami ou saucisson
       100 g de marshmallows
       1 pot de sauce tomate (la quantité varie en fonction de la taille de la pâte)
       Étapes :
       Disposer la pâte à pizza sur une plaque de cuisson de préférence trouée.
       La recouvrir de sauce tomate.
       Déposer les tranches de charcuterie et les marshmallows coupés en cube.
       Faire cuire à 200°C. La pâte doit croustiller, et les bombons doivent être fondues.");
       $recipe5->setSlug($this->input->generate($recipe5->getTitle()));
       $recipe5->setPoster('https://lh3.googleusercontent.com/Pb4bSrprpr3RrtKkAhgJH1JjVnsVbc9EQePyGfCByTqUcRxMa4bzQHeYxEf8SK9tRoF7HQ=s132');
       $recipe5->setContinent($this->getReference(ContinentFixtures::CONTINENT_3));
       $recipe5->setSerie($this->getReference(SerieFixtures::SERIE_2));

       $manager->persist($recipe5);

       // Recette 6
       $recipe6 = new Recipe();
       $recipe6->setTitle('Les muffins aux œufs et bacon de Dexter');
       $recipe6->setDescription("2 muffins anglais
       8 tranches de bacon
       4 tranches de cheddar
       2 oeufs
       beurre
       sel, poivre
       
       1. Préchauffez le four à 200°C.
       2. Coupez en deux les muffins et toastez-les légèrement.
       3. Faites cuire vos oeufs sur le plat avec du sel et du poivre.
       4. Dans une poêle, faites cuire le bacon à feu vif et réservez.
       5. Placez une tranche de cheddar sur chaque face des muffins.
       6. Sur un côté des muffins, disposez les tranches de bacon, puis l'oeuf et refermez avec l'autre côté du muffin.
       7. Disposez les muffins sur une plaque de four recouverte de papier sulfurisé.
       8. Enfournez pendant 7-8 minutes.");
       $recipe6->setSlug($this->input->generate($recipe6->getTitle()));
       $recipe6->setPoster('https://lh3.googleusercontent.com/CpVqU-MDi51OVnCJPPCbHDwLWaFT54N3kACmcWbDw7krAkgo6382SgCUId1IRM5ivVtS=s113');
       $recipe6->setContinent($this->getReference(ContinentFixtures::CONTINENT_2));
       $recipe6->setSerie($this->getReference(SerieFixtures::SERIE_3));

       $manager->persist($recipe6);

       $manager->flush();

        $this->addReference(self::RECIPE_1, $recipe1);
        $this->addReference(self::RECIPE_2, $recipe2);
        $this->addReference(self::RECIPE_3, $recipe3);
        $this->addReference(self::RECIPE_4, $recipe4);
        $this->addReference(self::RECIPE_5, $recipe5);
        $this->addReference(self::RECIPE_6, $recipe6);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            BlogFixtures::class,
            ContinentFixtures::class,
            FilmFixtures::class,
            SerieFixtures::class,
        ];
    }
}
