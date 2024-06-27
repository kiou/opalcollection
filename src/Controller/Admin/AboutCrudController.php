<?php

namespace App\Controller\Admin;

use App\Entity\About;
use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('A propos')
            ->setEntityLabelInPlural('A propos')
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
        yield ChoiceField::new('language', 'Language')
            ->setChoices(['English' => 'en', 'French' => 'fr', 'Spanish' => 'es'])
            ->allowMultipleChoices(false);
        yield FormField::addFieldset('Odile Palustran');
        yield TextField::new('titleodile', 'Titre Odile');
        yield ImageField::new('imageodile','Photo Odile')
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
                  
        yield TextEditorField::new('contentodile','Contenu Odile')
            ->hideOnIndex()
            ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
            ->setFormType(CKEditorType::class);

        yield FormField::addFieldset('Notre Vision');
        yield TextField::new('titlevision', 'Titre vision');
        yield TextEditorField::new('contentvision','Contenu vision')
            ->hideOnIndex()
            ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
            ->setFormType(CKEditorType::class);
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }

}
