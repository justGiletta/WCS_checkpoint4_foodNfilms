<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
            return Recipe::class;

    }

    public function configureFields(string $pageName): iterable
    {
        $title = TextField::new('title', 'Titre');
        $poster = TextField::new('poster', 'Image')->hideOnIndex();
        $description = TextareaField::new('description', 'Description')->hideOnIndex();
        $slug = SlugField::new('slug', 'Slug')
        ->setTargetFieldName('title')->hideOnIndex();
        $continent = AssociationField::new('continent', 'Catégorie');
        $film = AssociationField::new('film', 'Film');
        $serie = AssociationField::new('serie', 'Série');

        return [$title, $poster, $description, $slug, $continent, $film, $serie];
    }
}
