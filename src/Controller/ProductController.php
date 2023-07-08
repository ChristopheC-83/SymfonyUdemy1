<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class ProductController extends AbstractController
{

    #[Route('/product', name: 'app_product')]

    public function index(EntityManagerInterface $entityManager)
    {

        $products = $entityManager->getRepository(Product::class)->findBy(['valid'=>true]);
        $productsNonDispo = $entityManager->getRepository(Product::class)->findBy(['valid'=>false]);
        // dd($products); remplace 'afficherTableau' => die & dump
        return $this->render('products/index.html.twig', [
            'products' => $products,
            'productsNonDispo'=> $productsNonDispo
        ]);
    }
    #[Route('/product/{id}', name: 'app_product_show')]

    public function show($id, EntityManagerInterface $entityManager)

    {
        $product = $entityManager->getRepository(Product::class)->findOneBy(['id'=>$id]);
        return $this->render('products/show.html.twig', [
            'id'=> $id,
            'product'=>$product,
        ]);
    }
}
