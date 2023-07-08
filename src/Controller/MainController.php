<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function test()
    {
        $age = 44;
        $name = "kiki";


        return $this->render('main.html.twig', [
            'age' => $age,
            'name' => $name,
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact()
    {
        return $this->render('contact.html.twig');
    }
    #[Route('/tableaux', name: 'app_tableaux')]


    public function tableaux()
    {


        $fruits = ["Tomates", "Pommes", "Poires"];
        return $this->render('tableaux.html.twig', [

            'fruits' => $fruits,
        ]);
    }
}