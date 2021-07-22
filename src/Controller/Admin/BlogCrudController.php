<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $title = TextField::new('title', 'Titre');
        $author = TextField::new('author', 'Auteur');
        $date = DateTimeField::new('created_at', 'Date');
        $poster = TextField::new('poster', 'Image')->hideOnIndex();
        $article = TextareaField::new('article', 'Article')->hideOnIndex();
        $slug = SlugField::new('slug', 'Slug')
        ->setTargetFieldName('title')->hideOnIndex();

        return [$title, $poster, $article, $slug, $date, $author];
    }
}
