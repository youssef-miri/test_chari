<?php

namespace App\Http\Controllers;

use App\Article;
use App\Client;
use App\Commande;
use App\Lignecommande;
use Illuminate\Support\Facades\Cookie;
use App\Promoproduit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public  function addcomdpost(Request $request){
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
        $comd->date=$now;
        $comd->total=$total;
        $comd->save();
        $comdd= Commande::where('id_client','=',$client->id)->where('total','=',$total)->first();
        foreach ($produits as $pr){
            foreach ($cart as $c){
                if($c == $pr->id){
                    $ligneComd = new Lignecommande();
                    $ligneComd->id_comd=$comdd->id;
                    $ligneComd->id_art=$pr->id;
                    $ligneComd->qte=1;
                    $hasPromo = 0;
                    foreach ($promoproduits as $pm){
                        if($pm->id_produit == $pr->id){
                            $hasPromo = 1;
                            $ligneComd->pu=$pm->prix_promo;
                            $totale = $pm->prix_promo * 1;
                        }
                    }
                    if($hasPromo == 0){
                        $ligneComd->pu=$pr->pu;
                        $totale = $pr->pu * 1;
                    }
                    $ligneComd->total=$totale;
                    $ligneComd->save();

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

    public  function DetailComd($idCl){
        $comdd= Commande::where('id_client','=',$idCl)->first();
        $ligneComds = Lignecommande::where('id_comd','=',$comdd->id)->get();
        $total=0;
        foreach ($ligneComds as $ligneComd){
            $total+=$ligneComd->total;
        }
        $comdd->total = $total;
        $comdd->save();
        $respoonse = [
            'date' => $comdd->date,
            'total' => $total
        ];
        return response()->json($respoonse, 200);
    }
}
