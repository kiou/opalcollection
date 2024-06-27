<?php

namespace App\Controller\Admin;

use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use App\Form\Type\ImageType;
use App\Entity\TheCollection;
use App\Field\ImagePreviewField;
use App\Form\Type\TelechargementType;
use Doctrine\ORM\EntityManagerInterface;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TheCollectionCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return TheCollection::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('title')
            ->add('pays')
        ;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('The Collection')
            ->setEntityLabelInPlural('The Collections')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }
    
    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('css/Admin/app.css');
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();

        yield FormField::addFieldset('Informations générales');
        yield DateTimeField::new('created','Création')
            ->setFormat('long', 'none')
            ->onlyOnIndex();
        yield TextField::new('title', 'Titre');
        yield SlugField::new('slug', 'URL automatique')
            ->hideOnIndex()
            ->setTargetFieldName('title');
        yield TextField::new('link', 'Lien');
        yield AssociationField::new('pays','Pays')
            ->setSortProperty('name');
        yield ImageField::new('imagecarte','Image Carte')
            ->setUploadDir('public/img/upload/')
            ->setBasePath('img/upload/')
            ->setUploadedFileNamePattern('[slug]-'.$timestamp.'.[extension]')
            ->setFormTypeOption('upload_new', function(UploadedFile $file) use ($timestamp){
                $upload = new Upload();

                $image = $upload->createName(
                    $file->getClientOriginalName(),
                    $this->getUploadRootDir().'/',
                    $timestamp
                );

                $imagine = new Imagine();
                $size = new Box(1920,700);
                $imagine->open($file)
                        ->thumbnail($size, 'outbound')
                        ->save($this->getUploadRootDir().'upload/'.$image);

                $size = new Box(570,400);
                $imagine->open($file)
                        ->thumbnail($size, 'outbound')
                        ->save($this->getUploadRootDir().'miniature/'.$image);
        });
        yield ImageField::new('logo','Logo')
            ->setUploadDir('public/img/upload/')
            ->setBasePath('img/upload/')
            ->setUploadedFileNamePattern('[slug]-'.$timestamp.'.[extension]')
            ->setFormTypeOption('upload_new', function(UploadedFile $file) use ($timestamp){
                $upload = new Upload();

                $image = $upload->createName(
                    $file->getClientOriginalName(),
                    $this->getUploadRootDir().'/',
                    $timestamp
                );

                $imagine = new Imagine();
                $imagine->open($file)
                        ->save($this->getUploadRootDir().'upload/'.$image);
        });
        yield ChoiceField::new('language', 'Language')
            ->setChoices(['English' => 'en', 'French' => 'fr', 'Spanish' => 'es'])
            ->allowMultipleChoices(false);
        yield TextareaField::new('resume', 'Résumé')->hideOnIndex();

        yield FormField::addFieldset('Contenu page');
        //yield ImagePreviewField::new('headerimages')
            //->setLabel('Image(s) en tête');
        yield CollectionField::new('headerimages','Image(s) en tête')
            ->setEntryType(ImageType::class)
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
            ->hideOnIndex();
        yield TextEditorField::new('content','Contenu')
            ->hideOnIndex()
            ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
            ->setFormType(CKEditorType::class);
        yield CollectionField::new('telechargements','Téléchargements')
            ->setEntryType(TelechargementType::class)
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
            ->hideOnIndex();
        yield AssociationField::new('galeries','Galerie(s)')
            ->setSortProperty('title')
            ->hideOnIndex();

        yield FormField::addFieldset('Réseaux');
        yield TextField::new('youtube', 'Youtube')->hideOnIndex();
        yield TextField::new('facebook', 'Facebook')->hideOnIndex();
        yield TextField::new('linkedin', 'Linkedin')->hideOnIndex();
        yield TextField::new('instagram', 'Instagram')->hideOnIndex();

        yield BooleanField::new('isActive','Actif');
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        foreach ($entityInstance->getHeaderimages() as $headerimages) {
            $headerimages->upload();
            $headerimages->setTheCollection($entityInstance);
            $entityManager->persist($headerimages);
        }

        foreach ($entityInstance->getTelechargements() as $telechargements) {
            $telechargements->upload();
            $telechargements->setTheCollection($entityInstance);
            $entityManager->persist($telechargements);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        foreach ($entityInstance->getHeaderimages() as $headerimages) {
            $headerimages->upload();
            $headerimages->setTheCollection($entityInstance);
            $entityManager->persist($headerimages);
        }

        foreach ($entityInstance->getTelechargements() as $telechargements) {
            $telechargements->upload();
            $telechargements->setTheCollection($entityInstance);
            $entityManager->persist($telechargements);
        }

        parent::updateEntity($entityManager, $entityInstance);
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }

}
