<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Basic data'),
            TextField::new('firstName', 'First Name'),
            TextField::new('lastName', 'Last Name'),
            EmailField::new('email', 'Email'),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/images/members/')
                ->setUploadDir('public/uploads/images/members/'),
            FormField::addTab('Relations'),
            ChoiceField::new('seniority', 'Seniority'),
            CollectionField::new('roles', 'Role'),
            ChoiceField::new('mentor', 'Mentor')

        ];
    }
}
