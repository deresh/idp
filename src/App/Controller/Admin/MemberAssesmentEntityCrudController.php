<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Infrastructure\Doctrine\MemberAssesmentEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MemberAssesmentEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemberAssesmentEntity::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Procjena člana')
            ->setEntityLabelInPlural('Procjene po članovima')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('member', 'Član'),
            DatetimeField::new('dateTime', 'Datum'),
            ChoiceField::new('selfAssessedSeniority', 'Senioritet (samoprocjena)'),
            ChoiceField::new('agreedSeniority', 'Senioritet (usklađen)'),
            ChoiceField::new('progressStatus', 'Status napretka'),
        ];
    }
}
