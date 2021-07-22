<?php

namespace App\Controller\Admin;

use App\Entity\Continent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContinentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Continent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name', 'Nom');

        return [$name];
    }
}
