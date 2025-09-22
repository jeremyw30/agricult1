<?php

namespace App\Controller\Admin;

use App\Entity\Parcelle;
use App\Enum\TypeSolEnum;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

final class ParcelleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string { return Parcelle::class; }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Parcelle')
            ->setEntityLabelInPlural('Parcelles')
            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion des parcelles');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();

        yield ChoiceField::new('typeSol', 'Type de sol')
            ->setChoices($this->choicesFromEnum(TypeSolEnum::cases()));
    }

    private function choicesFromEnum(array $cases): array
    {
        $out = [];
        foreach ($cases as $c) {
            $out[$c->name.' ('.$c->value.')'] = $c; // valeur = instance enum
        }
        return $out;
    }
}
