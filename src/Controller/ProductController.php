<?php

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager) // Injection d'indépendance
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/nos-produits', name: 'products')]

    public function index(): Response {
        $products = $this->entityManager->getRepository(Product::class)->findAll(); // je récupère mes données à l'aide du repository
    // dd($products);

        return $this->render('product/index.html.twig', [
            'products' => $products,
            
        ]);
    }
}
