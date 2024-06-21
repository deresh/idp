<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Infrastructure\Doctrine\MemberToolEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            AssociationField::new('member'),
            AssociationField::new('tool'),
            ChoiceField::new('priority'),
            ChoiceField::new('status'),
            DateTimeField::new('startDate'),
            DateTimeField::new('endDate'),
            TextEditorField::new('comments'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Alat člana')
            ->setEntityLabelInPlural('Alati po članovima')
            ->showEntityActionsInlined()
            ;
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('member')
            ->add('tool')
            ->add('priority')
            ->add('status')
        ;
    }


}
