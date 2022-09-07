<?php 

namespace App\Classe;

use Symfony\Component\HttpFoundation\RequestStack;

class Cart {

    private $requestStack;

    public function __construct(RequestStack $requestStack){
            $this -> requestStack = $requestStack;
                        }

    //ajoute au panier
    public function add($id){
    $session = $this -> requestStack -> getSession();
    //on récupère les informations du panier a l'aide de la session
    $cart = $session -> get('cart', [

    ]);
    //si dans le panier il y a un produit déjà inséré 
    if (!empty($cart[$id])) {
        //on incrémente
        $cart[$id]++;
    }else {
        $cart[$id] = 1;
    }

    //on stock les informations du panier dans une session (cart)
    $session -> set('cart', $cart);

}
 //affiche le panier 
public function get(){

        $session = $this -> requestStack->getSession();
        return $session->get('cart');
}

public function remove(){

        $session = $this -> requestStack->getSession();
        return $session->remove('cart');
}

// SUPPRIME un produit du panier
public function delete($id) {

    // Je lance une session
    $session = $this->requestStack->getSession();

    // Je récupère les informations de ma session cart
    $cart = $session->get('cart', []);

    // Détruit l'élément correspondant
    unset($cart[$id]);

    // On redéfinit la nouvelle valeur dans la session cart
    return $session->set('cart', $cart);
}

public function decrease($id)
    {

        $session=$this->requestStack->getSession();

        $cart=$session->get('cart',[]);

        if($cart[$id] > 1){

            $cart[$id]--;

        }else {
            unset($cart[$id]);
        }


        $session->set('cart',$cart);

    }

}