<?php

namespace App\Controller\Admin;

use App\Entity\Machine;
use App\Enum\MachineTypeEnum;
use App\Enum\ConditionStatusEnum;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

final class MachineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string 
    { 
        return Machine::class; 
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Machine')
            ->setEntityLabelInPlural('Machines')
            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion des machines');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('idMachine')->onlyOnIndex();

        yield TextField::new('name', 'Nom');
        
        yield ChoiceField::new('type', 'Type')
            ->setChoices($this->choicesFromEnum(MachineTypeEnum::cases()));

        yield TextField::new('brand', 'Marque');
        yield TextField::new('model', 'Modèle');

        yield IntegerField::new('yearManufactured', 'Année de fabrication');
        yield IntegerField::new('powerHp', 'Puissance (HP)');

        yield NumberField::new('fuelConsumption', 'Consommation de carburant')
            ->setNumDecimals(2);

        yield NumberField::new('basePrice', 'Prix de base')
            ->setNumDecimals(2);

        yield ChoiceField::new('conditionStatus', 'État de condition')
            ->setChoices($this->choicesFromEnum(ConditionStatusEnum::cases()));

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