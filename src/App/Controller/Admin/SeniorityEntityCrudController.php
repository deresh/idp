<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Infrastructure\Doctrine\SeniorityEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SeniorityEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SeniorityEntity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Senioritet')
            ->setEntityLabelInPlural('Nivoi senioriteta')
            ->showEntityActionsInlined()
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('seniority', 'Senoritet'),
            TextEditorField::new('description', 'Opis'),
        ];
    }
}
