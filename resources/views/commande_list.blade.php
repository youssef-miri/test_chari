@include('partials.header')
<!--main area-->
<div class="ctn container">
    <div class="summary-item wrap-iten-in-cart">
        <h3 class="box-title">Commande</h3>
        <ul class="products-cart">
            @foreach($commandes as $c)
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('detailcomd',$c->id)}}">#{{ $c->id }}</a>
                    </div>
                    @foreach($clients as $cl)
                        @if($cl->id == $c->id_client)
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $cl->fname }} {{ $cl->lname }}</a>
                    </div>
                        @endif
                    @endforeach
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $c->date }}</a>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{ $c->total }}</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!--main area-->
@include('partials.footer')