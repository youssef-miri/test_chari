<?php

namespace App\Http\Controllers;

use App\Article;
use App\Promo;
use Illuminate\Support\Facades\Cookie;
use App\Promoproduit;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function ListProm()
    {
        $cart = Cookie::get('cart');
        $promos = Promo::all();
        return view('promotion_list', compact('promos','cart'));
    }
    public function detailProm($id)
    {
        $cart = Cookie::get('cart');
        $promo = Promo::FindOrFail($id);
        $produits = Article::all();
        $promoProduits = Promoproduit::where('id_promo','=',$id)->get();
        return view('promotion_detail', compact('promo','promoProduits','produits','cart'));
    }
    public function AddProm()
    {
        $cart = Cookie::get('cart');
        return view('promotion_add', compact('cart'));
    }
    public  function AddPromPost(Request $request){
        $promo= new Promo();
        $promo->libelle=$request->input('libelle');
        $promo->from=$request->input('from');
        $promo->to=$request->input('to');
        $promo->save();
        return redirect()->route('listprom')->with('status', 'add successfuly!');
    }
    public function delProm($id)
    {

        $a = Promo::FindOrFail($id);
        $a->delete();

        return redirect()->route('listprom')->with('status', 'Deleted successfuly!');

    }
}
