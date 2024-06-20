<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Infrastructure\Doctrine\MemberToolEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class MemberToolEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemberToolEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('member'),
            ChoiceField::new('Tool'),
            DateTimeField::new('start'),
            DateTimeField::new('end'),
            TextEditorField::new('comments'),
        ];
    }
}
