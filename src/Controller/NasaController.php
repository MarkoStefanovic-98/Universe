<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NasaController extends AbstractController
{
    /**
     * @Route("/nasa", name="nasa")
     */

    public function index(CallApiService $callApiService): Response
    {

        $tableaunasa = $callApiService->getNasaData()['near_earth_objects'];
        dump(array_keys($tableaunasa));
        foreach($tableaunasa as $info){
            dump($info);
    }
        //dump($tableaunasa);
        dd($callApiService->getNasaData());

        return $this->render('nasa/index.html.twig', [
            'data' => $callApiService->getNasaData(),
        ]);
    }
}
