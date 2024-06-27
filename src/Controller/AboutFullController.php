<?php
namespace App\Controller;

use App\Entity\AboutFull;
use App\Repository\ServiceRepository;
use App\Repository\AboutFullRepository;
use App\Repository\TheCollectionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutFullController extends AbstractController
{

    private $TheCollectionRepository;

    public function __construct(
            TheCollectionRepository $TheCollectionRepository,
            AboutFullRepository $AboutFullRepository,
            ServiceRepository $ServiceRepository
        )
    {
        $this->TheCollectionRepository = $TheCollectionRepository;
        $this->AboutFullRepository = $AboutFullRepository;
        $this->ServiceRepository = $ServiceRepository;
    }

    public function index(
        Request $request
    )
    {
        $locale = $request->getLocale();

        $theCollectionsMenu = $this->TheCollectionRepository->getCollectionMenu($locale);
        $aboutFull = $this->AboutFullRepository->getFullAbout($locale);
        $services = $this->ServiceRepository->getServices($locale);

        return $this->render('aboutfull.html.twig',[
            'theCollectionsMenu' => $theCollectionsMenu,
            'aboutFull' => $aboutFull,
            'services' => $services
        ]);
    }
}