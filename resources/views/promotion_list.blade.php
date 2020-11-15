@include('partials.header')
	<!--main area-->
	<div class="ctn container"> 
        <div class="summary-item wrap-iten-in-cart">
            <h3 class="box-title">Promotions</h3>
            <ul class="products-cart">
                @foreach($promos as $p)
                <li class="pr-cart-item">
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('detailprom',$p->id)}}">#{{ $p->id }}</a>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('detailprom',$p->id)}}">{{ $p->libelle }}</a>
                    </div>   
                    <div class="product-name">
                        <span class="link-to-product" href="#">{{ $p->from }}</span>
                    </div>   
                    <div class="product-name">
                        <span class="link-to-product" href="#">{{ $p->to }}</span>
                    </div> 
                    <div class="delete">
                        <a href="{{ route('delprom',$p->id)}}" onClick="return confirm(' Are you sure to delete promotion ? ')" class="btn btn-delete" title="">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <a href="{{ route('addprom')}}" class="btn btn-medium">Ajouter</a>
        </div>
    </div>
	<!--main area-->
@include('partials.footer')