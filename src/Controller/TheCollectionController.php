<?php
namespace App\Controller;

use App\Entity\TheCollection;
use App\Repository\TheCollectionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TheCollectionController extends AbstractController
{

    private $TheCollectionRepository;

    public function __construct(
            TheCollectionRepository $TheCollectionRepository
        )
    {
        $this->TheCollectionRepository = $TheCollectionRepository;
    }

    public function view(
        TheCollection $id,
        Request $request
    )
    {
        $locale = $request->getLocale();

        $theCollection = $this->TheCollectionRepository->find($id);
        $theCollectionsMenu = $this->TheCollectionRepository->getCollectionMenu($locale);

        return $this->render('thecollection.html.twig',[
            'theCollection' => $theCollection,
            'theCollectionsMenu' => $theCollectionsMenu
        ]);

    }
}