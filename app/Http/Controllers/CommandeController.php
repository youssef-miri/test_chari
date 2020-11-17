<?php

namespace App\Http\Controllers;

use App\Article;
use App\Client;
use App\Commande;
use App\Lignecommande;
use Illuminate\Support\Facades\Cookie;
use App\Promoproduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommandeController extends Controller
{
    public  function addcomdpost(Request $request){
        $tokken =Hash::make(Str::random(20));
        $cart = Cookie::get('cart');
        $promoproduits = Promoproduit::all();
        $produits = Article::all();

        $checkclient = Client::selectRaw("Count(*) as Total")->where('phone','=',$request->input('phone'))->first();
        if(intval($checkclient->Total) > 0){
            $client= Client::where('phone','=',$request->input('phone'))->first();
        }else{
            $client = new Client();
            $client->fname=$request->input('fname');
            $client->lname=$request->input('lname');
            $client->adr=$request->input('adr');
            $client->phone=$request->input('phone');
            $client->save();
            $client= Client::where('phone','=',$request->input('phone'))->first();
        }

        $now = date_create()->format('Y-m-d');
        $comd = new Commande();
        $comd->id_client=$client->id;
        $comd->token=$tokken;
        $comd->date=$now;
        $comd->total=0;
        $comd->save();
        $comdd= Commande::where('token','=',$tokken)->first();
        foreach ($produits as $pr){
            foreach ($cart as $c){
                if($c == $pr->id){
                    $ligneComd = new Lignecommande();
                    $ligneComd->id_comd=$comdd->id;
                    $ligneComd->id_art=$pr->id;
                    $ligneComd->libelle_art=$pr->libelle;
                    $ligneComd->pu=$pr->pu;
                    $ligneComd->tva=$pr->tva;
                    $ligneComd->qte=1;
                    $hasPromo = 0;
                    foreach ($promoproduits as $pm){
                        if($pm->id_produit == $pr->id){
                            $hasPromo = 1;
                            $ligneComd->pr=$pm->prix_promo;
                            $ligneComd->pourcentage=$pm->pourcentage;
                            $ligneComd->prix_tva=$pm->prix_promo+(($pm->prix_promo*$pr->tva)/100);
                            $totale = ($pm->prix_promo+(($pm->prix_promo*$pr->tva)/100)) * 1;
                        }
                    }
                    if($hasPromo == 0){
                        $ligneComd->pr=$pr->pu;
                        $ligneComd->prix_tva=$pr->pu+(($pr->pu*$pr->tva)/100);
                        $ligneComd->pourcentage= null;
                        $totale = ($pr->pu+(($pr->pu*$pr->tva)/100)) * 1;
                    }
                    $ligneComd->total_ttc=$totale;
                    $ligneComd->save();
                    $ligneComds = Lignecommande::where('id_comd','=',$comdd->id)->get();
                    $totalee = null;
                    foreach ($ligneComds as $lc){
                        $totalee += $lc->total_ttc;
                    }
                    $comdd->total = $totalee;
                    $comdd->save();
                    $art= Article::where('id','=',$pr->id)->first();
                    $artqte = $art->qte - 1;
                    $art->qte = $artqte;
                    $art->save();
                    Cookie::queue(
                        Cookie::forget('cart')
                    ) ;
                }
            }
        }
        return redirect()->route('cart');

    }
    public function listcomd()
    {
        $cart = Cookie::get('cart');
        $commandes = Commande::all();
        $clients =  Client::all();
        return view('commande_list', compact('commandes','cart','clients'));
    }
    public  function DetailComd($id){
        $cart = Cookie::get('cart');
        $comdd= Commande::FindOrFail($id);
        $ligneComds = Lignecommande::where('id_comd','=',$comdd->id)->get();
        return view('commande_detail', compact('comdd','cart','ligneComds'));
    }
}
