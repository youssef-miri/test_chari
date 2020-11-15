@include('partials.header')
	<!--main area-->
	<div class="ctn container"> 
        <div class="summary-item wrap-iten-in-cart">
            <h3 class="box-title">Produits</h3>
            <ul class="products-cart">
                @foreach($produits as $pr)
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="#">#{{ $pr->ref }}</a>
                    </div>  
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $pr->libelle }}</a>
                    </div>  
                    <div class="price-field produtc-price"><p class="price">{{ $pr->pu }}DH</p></div>
                    <div class="price-field sub-total"><p class="price">{{ $pr->qte }}</p></div>
                    <div class="product-name">
                        <a class="link-to-product" href="#">@foreach($categories as $c) @if($c->id == $pr->id_cat) {{$c->libelle}} @endif @endforeach</a>
                    </div>  
                    <div class="delete">
                        <a href="{{ route('delproduit',$pr->id)}}" onClick="return confirm(' Are you sure to delete product ? ')" class="btn btn-delete" title="">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <a href="{{ route('addproduit')}}" class="btn btn-medium">Ajouter</a>
        </div>
    </div>
	<!--main area-->
@include('partials.footer')