<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Enum\HealthProfileEnum;
use App\Enum\GenderEnum;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

final class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string 
    { 
        return Animal::class; 
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Animal')
            ->setEntityLabelInPlural('Animaux')
            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion des animaux');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('idAnimal')->onlyOnIndex();

        yield TextField::new('type', 'Type');
        yield TextField::new('breed', 'Race');
        
        yield ChoiceField::new('gender', 'Genre')
            ->setChoices($this->choicesFromEnum(GenderEnum::cases()));

        yield NumberField::new('baseWeightKg', 'Poids de base (kg)')
            ->setNumDecimals(2);

        yield NumberField::new('basePrice', 'Prix de base')
            ->setNumDecimals(2);

        yield NumberField::new('averageProductivity', 'Productivité moyenne')
            ->setNumDecimals(2);

        yield ChoiceField::new('healthProfile', 'Profil de santé')
            ->setChoices($this->choicesFromEnum(HealthProfileEnum::cases()));

        yield IntegerField::new('reproductionCycleDays', 'Cycle de reproduction (jours)');

        yield DateTimeField::new('createdAt', 'Date de création')
            ->onlyOnIndex();
    }

    private function choicesFromEnum(array $cases): array
    {
        $out = [];
        foreach ($cases as $c) {
            $out[$c->name.' ('.$c->value.')'] = $c;
        }
        return $out;
    }
}