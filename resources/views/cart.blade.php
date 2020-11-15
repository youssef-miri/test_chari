@include('partials.header')

	<!--main area-->
	<main id="main" class="ctn main-site">

		<div class="container"> 
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
					<h3 class="box-title"> </h3>
					<ul class="products-cart">
						@isset($produits)
						@foreach($produits as $pr)
							@isset($cart)
							@foreach($cart as $c)
								@if($c == $pr->id)
									<li class="pr-cart-item">
							<div class="product-name">
								<a class="link-to-product" href="#">#{{$pr->ref}}</a>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="#">{{$pr->libelle}}</a>
							</div>
							<div class="price-field produtc-price">
								<p class="price">
                                    <?php $hasPromo = 0 ?>
									@foreach($promoproduits as $pm)
										@if($pm->id_produit == $pr->id){{$pm->prix_promo}}DH <?php $hasPromo = 1 ?> @endif
									@endforeach
										@if($hasPromo == 0) {{$pr->pu}}DH @endif
								</p>
							</div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >									
									<a class="btn btn-increase" href="#"></a>
									<a class="btn btn-reduce" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">
                                    <?php $hasPromo = 0 ?>
									@foreach($promoproduits as $pm)
										@if($pm->id_produit == $pr->id){{$pm->prix_promo}}DH <?php $hasPromo = 1 ?> <?php $total +=$pm->prix_promo ?> @endif
									@endforeach
									@if($hasPromo == 0) {{$pr->pu}}DH <?php $total +=$pr->pu ?> @endif
								</p></div>
							<div class="delete">
								<a href="{{ route('delfromcart',$pr->id)}}" data-prid="{{ $pr->id }}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</li>
								@endif
							@endforeach
							@endisset
						@endforeach
						@endisset
					</ul>
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4> 
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">{{$total}}</b></p>
					</div>
					<div class="checkout-info">
						<a class="btn btn-checkout" href="{{ route('checkout')}}">Check out</a>
					 </div>
					<div class="update-clear">
						<a class="btn btn-update" href="#">Mettre à jour</a>
					</div>
				</div> 

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@include('partials.footer')