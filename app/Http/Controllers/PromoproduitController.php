<?php

namespace App\Http\Controllers;

use App\Article;
use App\Promo;
use App\Promoproduit;
use Illuminate\Http\Request;

class PromoproduitController extends Controller
{
    public  function AddPromproduitPost(Request $request){
        $checkpromo = Promo::selectRaw("Count(*) as Total")->where('id','=',$request->input('id_promo'))->first();
        $checkarticle = Article::selectRaw("Count(*) as Total")->where('ref','=',$request->input('ref'))->first();
        $prix_pr = trim($request->input('prix_promo'));
        $pourcentage = trim($request->input('pourcentage'));
        if(intval($checkpromo->Total) > 0 && intval($checkarticle->Total) > 0){
            if ($prix_pr !== "" || $pourcentage !== ""){
                $produit= Article::where('ref','=',$request->input('ref'))->first();
                $promo= new Promoproduit();
                $promo->id_promo=$request->input('id_promo');
                $promo->id_produit=$produit->id;
                $promo->prix=$produit->pu;
                if ($prix_pr !== ""){
                    $a = $produit->pu - $prix_pr;
                    $pourcentagee = ($a / $produit->pu)*100;
                    $promo->prix_promo=$prix_pr;
                    $promo->pourcentage=$pourcentagee;
                }
                if ($pourcentage !== ""){
                    $a = ($produit->pu * $pourcentage)/100;
                    $prix_promoo = $produit->pu - $a;
                    $promo->prix_promo=$prix_promoo;
                    $promo->pourcentage=$pourcentage;
                }
                $promo->save();
                return redirect()->back()->with('status', 'add successfuly!');
            }

        }

        return redirect()->back()->with('status', 'err');
    }
    public function delPromproduit($id)
    {
        $a = Promoproduit::FindOrFail($id);
        $a->delete();
        return redirect()->back()->with('status', 'Deleted successfuly!');
    }
}
