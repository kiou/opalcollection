<?php
namespace App\Controller;

use App\Repository\PaysRepository;
use App\Repository\HeadersRepository;
use App\Repository\TheCollectionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalController extends AbstractController
{

    private $HeadersRepository;
    private $PaysRepository;
    private $TheCollectionRepository;

    public function __construct(
            HeadersRepository $HeadersRepository,
            PaysRepository $PaysRepository,
            TheCollectionRepository $TheCollectionRepository
        )
    {
        $this->HeadersRepository = $HeadersRepository;
        $this->PaysRepository = $PaysRepository;
        $this->TheCollectionRepository = $TheCollectionRepository;
    }

    public function indexnolocale()
    {
        return $this->redirectToRoute('app_index', ['_locale' => $this->getParameter('kernel.default_locale')]);
    }

    public function index(
        Request $request
    )
    {
        $locale = $request->getLocale();

        $headers = $this->HeadersRepository->getAllHeaders($locale);
        $pays = $this->PaysRepository->getAllPays($locale);
        $theCollections = $this->TheCollectionRepository->getAllCollections($locale);
        $theCollectionsMenu = $this->TheCollectionRepository->getCollectionMenu($locale);

        return $this->render('index.html.twig',[
            'action' => 'accueil',
            'headers' => $headers,
            'pays' => $pays,
            'theCollections'=> $theCollections,
            'theCollectionsMenu' => $theCollectionsMenu
        ]);
    }

}