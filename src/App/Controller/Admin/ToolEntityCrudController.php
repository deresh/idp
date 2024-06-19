<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Infrastructure\Doctrine\ToolEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ToolEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ToolEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            ChoiceField::new('priority'),
            ChoiceField::new('seniority'),
            TextField::new('name'),
            TextEditorField::new('description'),
        ];
    }
}
