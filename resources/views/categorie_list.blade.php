@include('partials.header')
<!--main area-->
<div class="ctn container">
    <div class="summary-item wrap-iten-in-cart">
        <h3 class="box-title">Categories</h3>
        <ul class="products-cart">
            @foreach($categories as $c)
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="#">#{{ $c->id }}</a>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $c->libelle }}</a>
                    </div>
                    <div class="delete">
                        <a href="{{ route('delcat',$c->id)}}" onClick="return confirm(' Are you sure to delete the Categorie ? ')" class="btn btn-delete" title="">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('addcat')}}" class="btn btn-medium">Ajouter</a>
    </div>
</div>
<!--main area-->
@include('partials.footer')