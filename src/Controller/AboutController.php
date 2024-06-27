<?php
namespace App\Controller;

use App\Entity\About;
use App\Repository\AboutRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
    public function view(
        AboutRepository $AboutRepository,
        Request $request
    )
    {
        $locale = $request->getLocale();

        $about = $AboutRepository->getAbout($locale);

        return $this->render('include/about.html.twig',[
            'about' => $about
        ]);

    }
}