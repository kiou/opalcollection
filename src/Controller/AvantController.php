<?php
namespace App\Controller;

use App\Entity\Avant;
use App\Repository\AvantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvantController extends AbstractController
{
    public function view(
        AvantRepository $AvantRepository,
        Request $request
    )
    {
        $locale = $request->getLocale();

        $avant = $AvantRepository->getAvant($locale);

        return $this->render('include/avant.html.twig',[
            'avant' => $avant
        ]);

    }
}