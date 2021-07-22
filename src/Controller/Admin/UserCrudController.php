<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name', 'Nom');
        $email = EmailField::new('email', 'Email');
        $roles = ChoiceField::new('roles', 'Roles')
            ->allowMultipleChoices()
            ->autocomplete()
            ->setChoices([
                'User' => 'ROLE_USER',
                'Admin' => 'ROLE_ADMIN',
            ]);
        $password = TextField::new('password')->hideOnIndex();

        return [$name, $email, $roles, $password];
    }
}
