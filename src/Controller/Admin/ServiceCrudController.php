<?php

namespace App\Controller\Admin;

use Imagine\Image\Box;
use App\Entity\Service;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Service')
            ->setEntityLabelInPlural('Services')
            ->setDefaultSort(['id' => 'DESC']);
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();
        
        yield DateTimeField::new('created','Création')
            ->setFormat('long', 'none')
            ->onlyOnIndex();
        yield TextField::new('title', 'Titre');
        yield ImageField::new('image','Image')
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
        yield ChoiceField::new('categorie', 'Catégorie')
            ->setChoices([
                    'Trade one to one' => 'trade',
                    'Marketing' => 'market',
                    'Consulting' => 'consult',
                    'Online communication' => 'online'
                 ])
            ->allowMultipleChoices(false);  
        yield ChoiceField::new('language', 'Language')
            ->setChoices(['English' => 'en', 'French' => 'fr', 'Spanish' => 'es'])
            ->allowMultipleChoices(false);        
        yield TextareaField::new('content', 'Contenu');
        yield BooleanField::new('isActive','Actif');
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }


}
