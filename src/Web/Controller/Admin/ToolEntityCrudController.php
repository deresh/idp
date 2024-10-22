<?php

namespace Web\Controller\Admin;

use Domain\Member\Model\Role;
use Domain\Member\Model\SeniorityLevel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Infrastructure\Doctrine\RoleEntity;
use Infrastructure\Doctrine\SeniorityEntity;
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

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Alat')
            ->setEntityLabelInPlural('Alati')
            ->setSearchFields(['name', 'description', 'role', 'seniority'])
            ->showEntityActionsInlined()
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('priority'),
            ChoiceField::new('seniority'),
            ChoiceField::new('role'),
            TextField::new('name'),
            TextEditorField::new('description'),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        $roles = [];
        foreach (Role::cases() as $case) {
            $roles[$case->name] = $case->value;
        }

        $seniorities = [];
        foreach (SeniorityLevel::cases() as $case) {
            $seniorities[$case->name] = $case->value;
        }

        return $filters
            ->add(ChoiceFilter::new('seniority')->setChoices($seniorities))
            ->add(ChoiceFilter::new('role')->setChoices($roles))
            ->add('priority')
            ;
    }
}
