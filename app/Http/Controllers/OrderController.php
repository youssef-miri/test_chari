<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Illuminate\Support\Facades\Cookie;
use App\Promoproduit;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Boutique()
    {
        $cart = Cookie::get('cart');
        $categories = Categorie::all();
        $promoproduits = Promoproduit::all();
        $produits = Article::all();
        $hasPromo = 0;
        return view('shop', compact('promoproduits','produits','categories','hasPromo','cart'));
    }

    public function Cart()
    {
        $hasPromo = 0;
        $total = 0;
        $cart = Cookie::get('cart');
       $promoproduits = Promoproduit::all();
        $produits = Article::all();
        return view('cart', compact('produits','cart','promoproduits','hasPromo','total'));
    }
    public function checkout()
    {
        $hasPromo = 0;
        $total = 0;
        $cart = Cookie::get('cart');
        $promoproduits = Promoproduit::all();
        $produits = Article::all();
        foreach ($produits as $pr){
            foreach ($cart as $c){
                if($c == $pr->id){
                $hasPromo = 0;
                foreach ($promoproduits as $pm){
                    if($pm->id_produit == $pr->id){
                        $hasPromo = 1;
                        $total +=$pm->prix_promo;
                    }
                }
                if($hasPromo == 0){
                    $total +=$pr->pu;
                }
                }
            }
        }
        return view('checkout', compact('total','cart'));
    }
}
