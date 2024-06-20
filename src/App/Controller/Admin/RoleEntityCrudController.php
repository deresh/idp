<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Infrastructure\Doctrine\RoleEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RoleEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RoleEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('id', 'Role'),
            TextEditorField::new('description'),
        ];
    }
}
