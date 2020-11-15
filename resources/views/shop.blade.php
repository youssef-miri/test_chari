@include('partials.header')
	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul> 
					<li class="item-link"><span> </span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
 

					<div class="wrap-shop-control">

						<h1 class="shop-title">ALL CATEGORIES</h1>

					</div><!--end wrap shop control-->

					<div class="row">

						<ul class="product-list grid-products equal-container">
							@isset($produits)
							@foreach($produits as $pr)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="#" title="">
											<figure><img src="{{ asset('images/logo-top-1.png') }}" alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>{{ $pr->libelle }}</span></a>
                                        <?php $hasPromo = 0 ?>
										@foreach($promoproduits as $pm)
											@if($pm->id_produit == $pr->id)
												<div class="wrap-price"><ins><p class="product-price">{{$pm->prix_promo}}DH</p></ins> <del><p class="product-price">{{$pm->prix}}DH</p></del></div>
                                                <?php $hasPromo = 1 ?>
											@endif
										@endforeach
										@if($hasPromo == 0)
											<div class="wrap-price"><span class="product-price">{{$pr->pu}}DH</span></div>
										@endif
										<a href="#" data-prid="{{ $pr->id }}" class="addcart btn add-to-cart">Add To Cart</a>
									</div>
								</div>
							</li>
							@endforeach
							@endisset
						</ul>

					</div>

					<div class="wrap-pagination-info">
						<ul class="page-numbers">
							<li><span class="page-number-item current" >1</span></li>
							<li><a class="page-number-item" href="#" >2</a></li>
							<li><a class="page-number-item" href="#" >3</a></li>
							<li><a class="page-number-item next-link" href="#" >Next</a></li>
						</ul>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								@isset($categories)
								@foreach($categories as $cat)
								<li class="category-item">
									<a href="#" class="cate-link">{{ $cat->libelle }}</a>
								</li>
								@endforeach
								@endisset
							</ul>
						</div>
					</div><!-- Categories widget-->
 
				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
@include('partials.footer')
