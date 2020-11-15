@include('partials.header')
	<!--main area-->
	<div class="ctn container">  
        <div class="summary-item wrap-iten-in-cart">
            <h3 class="box-title"></h3>
            <ul class="products-cart">
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="#">#{{ $promo->id }}</a>
                    </div>  
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $promo->libelle }}</a>
                    </div>   
                    <div class="product-name">
                        <span class="link-to-product" href="#">{{ $promo->from }}</span>
                    </div>   
                    <div class="product-name">
                        <span class="link-to-product" href="#">{{ $promo->to }}</span>
                    </div>  
                </li> 												
            </ul>  
            <h3 class="box-title">Produits de Promotion</h3>
            <ul class="products-cart">
                @isset($promoProduits)
                @foreach($promoProduits as $pr)
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="#"># @foreach($produits as $pd) @if($pd->id == $pr->id_produit) {{ $pd->ref }} @endif @endforeach </a>
                    </div>  
                    <div class="product-name">
                        <a class="link-to-product" href="#">@foreach($produits as $pd) @if($pd->id == $pr->id_produit) {{ $pd->libelle }} @endif @endforeach</a>
                    </div>  
                    <div class="price-field produtc-price"><p class="price">{{ $pr->prix }}</p></div>
                    <div class="price-field produtc-price"><p class="price">{{ $pr->prix_promo }}</p></div>
                    <div class="price-field produtc-price"><p class="price">{{ $pr->pourcentage }}%</p></div>
                    <div class="delete">
                        <a href="{{ route('delpromproduit',$pr->id)}}" onClick="return confirm(' Are you sure to delete product ? ')" class="btn btn-delete" title="">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endforeach
                @endisset
            </ul>
        </div>
            <div class="summary-item wrap-address-billing wrap-iten-in-cart">
                <form method="POST" action="{{route('Addpromproduit.post')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_promo" value="{{ $promo->id }}">
                    <p class="row-in-form">
                        <label for="reference">référence<span>*</span></label>
                        <input id="reference" type="text" name="ref" value="" placeholder="référence">
                    </p>
                    <p class="row-in-form">
                        <label for="pu">Prix Promotion<span>*</span></label>
                        <input id="pu" type="number" name="prix_promo" value="" placeholder="prix unitaire.">
                    </p>
                    <p class="row-in-form">
                        <label for="qte">Pourcentage %<span>*</span></label>
                        <input id="qte" type="number" name="pourcentage" value="" placeholder="Qte disponibles en stock">
                    </p>
                    <input type="submit" value="Ajouter" class="btn btn-medium"/>
                </form>
            </div>
    </div>
	<!--main area-->
@include('partials.footer')