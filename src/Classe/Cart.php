<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\RequestStack;

Class Cart
{

    private $requestStack;
    // private$entityManager;
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }


    // Affiche le panier 
    public function get(){

        $session=$this->requestStack->getSession();

        return $session->get('cart');
    }

    // Supprime le panier
    public function remove(){

        $session=$this->requestStack->getSession();

        return $session->remove('cart');
    }


    public function add($id)
    {

        $session=$this->requestStack->getSession();
        $cart = $session->get('cart',[]);
        // Si dans le panier il y'a un produit déjà inséré
        if(!empty($card[$id])) {
            // On incrémente
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        // On stocke les informations du panier dans une session (cart)
        $session->set('cart', $cart);

    }
}

?>