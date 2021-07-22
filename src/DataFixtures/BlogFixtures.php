<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture implements DependentFixtureInterface
{
    private $input;

    public function __construct(Slugify $input)
    {
        $this->input = $input;
    }

    public function load(ObjectManager $manager)
    {
        // Article 1
        $article1 = new Blog();
        $article1->setTitle('QUAND LE CINÉMA SUBLIME LA NOURRITURE');
        $article1->setArticle('Chez Food\'n Films, on aime aussi bien manger que regarder des films. Alors quand on est tombés sur cette vidéo, réalisée par Danielle Del Plato, qui compile les moments de cinéma où la nourriture est le plus joliment représentée, on a eu l\'eau à la bouche. De Pulp Fiction à Matrix en passant par Fargo, Jurassic Park ou encore Orange Mécanique, les grands classiques du septième art sont représentés, et croisent des plats tous plus alléchants les uns que les autres. Le tout sur du Mozart, bien sûr.');
        $article1->setAuthor('Un auteur');
        $article1->setCreatedAt(new \DateTimeImmutable());
        $article1->setPoster('http://rockyrama.com/uploads/img/article/1140-food-in-film-quand-le-cinema-sublime-la-nourriture/food.jpg');
        $article1->setSlug($this->input->generate($article1->getTitle()));

        $manager->persist($article1);

        // Article 2
        $article2 = new Blog();
        $article2->setTitle('LE CINÉMA SE MET À TABLE');
        $article2->setArticle("De toutes les cinématographies, la française est celle qui reste la plus attachée à la mise en scène des repas.
        Chez les deux Claude, par exemple, Chabrol et Sautet, on passe beaucoup de temps à table. Pour régler ses comptes en famille, conclure une affaire, séduire, rompre, se réconcilier, ou choquer le bourgeois. Mais aussi, plus simplement, pour se retrouver entre copains ou par simple gourmandise.
        En France, manger est un acte profondément culturel. Il atteint parfois le niveau des beaux-arts, et l'orgueil qui lui est associé. Roland Joffé en a fait un film avec Gérard Depardieu, Vatel(2000), l'histoire de ce pâtissier-traiteur et maître d'hôtel qui eut la charge d'organiser en août 1671 un festin en l'honneur de Louis XIV, avec 3000 invités.
        Le troisième jour, un retard dans la livraison des poissons lui laisse croire qu'il ne pourra pas être à la hauteur. Il se suicidera: Je ne survivrai pas à cet affront.
        François Vatel, pâtissier, traiteur, maître d'hôtel et grand organisateur de festins sous Louis XIV. La nourriture devient même un sujet à part entière dans les comédies les plus populaires, à l'image du Grand Restaurant (1966) et de L'Aile ou la cuisse (1976) avec un de Funès qui incarne, de manière un peu ridicule et arrogante, la qualité française contre la malbouffe industrielle.
        Luis Bunuel jouera beaucoup de cette obsession française dans deux films ironiques: Le Charme discret de la bourgeoisie (1972) où les convives, déjà attablés, sont toujours empêchés de manger, et Le Fantôme de la Liberté (1974) où les invités se déculottent et s'assoient directement sur les toilettes avant d'entamer les entrées.
        Pour restaurer l'image de la cuisine française, qui s'est parfois perdue dans le snobisme, on attendra Ratatouille (2007), le petit rat à l'odorat subtil qui rêve de devenir chef et fera saliver ses clients dans un Paris idéalisé.
        ");
        $article2->setAuthor('Un autre auteur');
        $article2->setCreatedAt(new \DateTimeImmutable());
        $article2->setPoster('https://www.rts.ch/2017/12/28/11/37/9206791.image?mw=1280');
        $article2->setSlug($this->input->generate($article2->getTitle()));

        $manager->persist($article2);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
