<?php

namespace App\Controller\Admin;

use App\Entity\Pays;
use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pays::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();

        yield DateTimeField::new('created','Création')
            ->setFormat('long', 'none')
            ->onlyOnIndex();
        yield TextField::new('name', 'Nom');
        yield TextField::new('code', 'Code');
        yield TextField::new('color', 'Couleur');
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
                $imagine->open($file)
                        ->save($this->getUploadRootDir().'upload/'.$image);
        });
        yield ChoiceField::new('language', 'Language')
            ->setChoices(['English' => 'en', 'French' => 'fr', 'Spanish' => 'es'])
            ->allowMultipleChoices(false);
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }

}
