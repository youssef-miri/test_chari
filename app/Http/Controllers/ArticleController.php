<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function Listproduit()
    {
        $cart = Cookie::get('cart');
        $categories = Categorie::all();
        $produits = Article::all();
        return view('produit_list', compact('categories','produits','cart'));
    }
    public function Addproduit()
    {
        $cart = Cookie::get('cart');
        $categories = Categorie::all();
        return view('produit_add', compact('categories','cart'));
    }
    public  function AddproduitPost(Request $request){
        $prod= new Article();
        $prod->ref=$request->input('ref');
        $prod->libelle=$request->input('libelle');
        $prod->pu=$request->input('pu');
        $prod->qte=$request->input('qte');
        $prod->id_cat=$request->get('id_cat');
        $prod->save();
        return redirect()->route('listproduit')->with('status', 'add successfuly!');
    }
    public function delproduit($id)
    {

        $a = Article::FindOrFail($id);
        $a->delete();

        return redirect()->route('listproduit')->with('status', 'Deleted successfuly!');

    }
    public function addtocart(Request $request)
    {
        $idar = $request->ida;
        $value = Cookie::get('cart');
        if ($value !== null){
            if (in_array($idar, $value)) {
                return redirect()->route('boutique')->with('status', 'Déja dans le chariot');
            }else{
                array_push($value,$idar);
            }
        }else{
            $value = array($idar);
        }

        Cookie::queue('cart', $value,576000000);
        $arr = array('ida' => $request->ida);
        $data = json_encode($arr);
        return response()->json($data);
    }
    public function delfromcart($id)
    {
        $value = Cookie::get('cart');
        if ($value !== null){

            if (in_array($id, $value)) {
                $key = array_search($id, $value);
                unset($value[$key]);
            }else{

                return redirect()->route('boutique');

            }
        }else{

            return redirect()->route('boutique');
        }
        Cookie::queue('cart', $value);
        return redirect()->route('cart');
    }
}
