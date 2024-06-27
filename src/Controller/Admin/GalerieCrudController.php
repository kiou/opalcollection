<?php

namespace App\Controller\Admin;

use App\Entity\Galerie;
use App\Form\Type\ImageTypeGalerie;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GalerieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Galerie::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('title');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Galerie photo')
            ->setEntityLabelInPlural('Galeries Photos')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();

        yield DateTimeField::new('created','Création')
            ->setFormat('long', 'none')
            ->onlyOnIndex();
        yield TextField::new('title', 'Titre');
        yield CollectionField::new('galerieimages','Image(s)')
        ->setEntryType(ImageTypeGalerie::class)
        ->setFormTypeOptions([
            'by_reference' => false,
        ])
        ->onlyOnForms();
        yield BooleanField::new('isActive','Actif');

    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        foreach ($entityInstance->getGalerieimages() as $galerieimages) {
            $galerieimages->upload();
            $galerieimages->setGalerie($entityInstance);
            $entityManager->persist($galerieimages);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        foreach ($entityInstance->getGalerieimages() as $galerieimages) {
            $galerieimages->upload();
            $galerieimages->setGalerie($entityInstance);
            $entityManager->persist($galerieimages);
        }

        parent::updateEntity($entityManager, $entityInstance);
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }

}
