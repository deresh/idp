<?php

namespace Web\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Infrastructure\Doctrine\MemberEntity;

class MemberEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemberEntity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Član')
            ->setEntityLabelInPlural('Članovi')
            ->showEntityActionsInlined()
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Basic data'),
            TextField::new('firstName', 'First Name'),
            TextField::new('lastName', 'Last Name'),
            EmailField::new('email', 'Email'),
            AssociationField::new('team', 'Team'),

            FormField::addTab('Relations'),
            ChoiceField::new('seniority', 'Seniority'),
            AssociationField::new('roles', 'Role'),
            AssociationField::new('mentor', 'Mentor'),
            FormField::addTab('Misc'),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/images/members/')
                ->setUploadDir('public/uploads/images/members/')
                ->setRequired(false),

        ];
    }


}
