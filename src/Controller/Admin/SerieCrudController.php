<?php

namespace App\Controller\Admin;

use App\Entity\Serie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SerieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Serie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $title = TextField::new('title', 'Titre');
        $poster = TextField::new('poster', 'Image')->hideOnIndex();
        $summary = TextareaField::new('summary', 'Résumé')->hideOnIndex();
        $slug = SlugField::new('slug', 'Slug')
        ->setTargetFieldName('title')->hideOnIndex();
        $continent = AssociationField::new('continent', 'Catégorie');

        return [$title, $poster, $summary, $slug, $continent];
    }
}
