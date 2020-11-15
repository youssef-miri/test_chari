<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Illuminate\Support\Facades\Cookie;

class CategorieController extends Controller
{
    public function ListCat()
    {
        $cart = Cookie::get('cart');
        $categories = Categorie::all();
        return view('categorie_list', compact('categories','cart'));
    }
    public function AddCat()
    {
        $cart = Cookie::get('cart');
        return view('categorie_add', compact('cart'));
    }
    public  function AddCatPost(Request $request){
        $cat= new Categorie();


        $cat->libelle=$request->input('libelle');


        $cat->save();


        return redirect()->route('listcat')->with('status', 'add successfuly!');
    }
    public function delCat($id)
    {
        $cat = Categorie::FindOrFail($id);
        $cat->delete();
        return redirect()->route('listcat')->with('status', 'Deleted successfuly!');
    }
}
