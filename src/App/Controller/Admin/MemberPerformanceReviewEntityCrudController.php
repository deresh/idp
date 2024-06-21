<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Infrastructure\Doctrine\MemberPerformanceReviewEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MemberPerformanceReviewEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemberPerformanceReviewEntity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Osvrt')
            ->setEntityLabelInPlural('Lista osvrta / SRMova')
            ->showEntityActionsInlined()
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('member'),
            AssociationField::new('mentor'),
            ChoiceField::new('progressStatus'),
            DateTimeField::new('srmDate'),
            TextEditorField::new('feedback'),
            TextEditorField::new('response'),
        ];
    }
}
