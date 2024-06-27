<?php

namespace App\Form\Type;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your name *'],
            ])
            ->add('email', EmailType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your e-mail *'],
            ])
            ->add('telephone', TextType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your phone *'],
            ])
            ->add('company', TextType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your company *'],
            ])
            ->add('country', TextType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your country *'],
            ])
            ->add('message', TextareaType::class,[
                'label' => false,
                'attr' => [ 'placeholder' => 'Your message *'],
            ])
            ->add('Envoyer', SubmitType::class,[
                'label' => 'Submit',
                'attr' => ['class' => 'btn btnSubmit']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}
