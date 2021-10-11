<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use App\Entity\Property;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('title'),
            TextEditorField::new('adress'),
            IntegerField::new('postal'),
            TextEditorField::new('describtion'),
            IntegerField::new('price'),
            TextField::new('type'),
            TextField::new('status'),
            IntegerField::new('area'),
            IntegerField::new('kitchen'),
            IntegerField::new('garage'),
            IntegerField::new('rooms'),
            TextEditorField::new('outside'),
            TextEditorField::new('above'),
            TextEditorField::new('peb'),
            TextEditorField::new('slug'),
            TextareaField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Image'),
        ];
    }
}
