<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactType;
use App\Repository\TheCollectionRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ContactController extends AbstractController
{

    private $TheCollectionRepository;

    public function __construct(
            TheCollectionRepository $TheCollectionRepository
        )
    {
        $this->TheCollectionRepository = $TheCollectionRepository;
    }

    public function index(Request $request)
    {
        $locale = $request->getLocale();

        $theCollectionsMenu = $this->TheCollectionRepository->getCollectionMenu($locale);

        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact,[
            'action' => $this->generateUrl('sendcontact')
        ]);

        return $this->render('contact.html.twig',[
            'form' => $form->createView(),
            'theCollectionsMenu' => $theCollectionsMenu
        ]);
    }

    public function send(
        Request $request,
        MailerInterface $mailer,
    )
    {   
        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $email = (new TemplatedEmail())
                ->from('webmaster@crusmar.com')
                ->to('pinelli.luc@outlook.fr')
                ->subject("Formulaire du site internet")
                ->htmlTemplate('mail/layout.html.twig')
                ->context([
                    'nomdata' => $form->getData()->getNom(),
                    'prenomdata' => $form->getData()->getPrenom(),
                    'telephonedata' => $form->getData()->getTelephone(),
                    'emaildata' => $form->getData()->getEmail(),
                    'messagedata' => $form->getData()->getMessage()
                ]);
    
            $mailer->send($email);
            $request->getSession()->getFlashBag()->add('succes', 'Votre message à bien été envoyé');
    
            return $this->redirect($this->generateUrl('app_contact'));
        }

    }

}