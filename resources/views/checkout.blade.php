@include('partials.header')
	<!--main area-->
	<main id="main" class="ctn main-site">

		<div class="container"> 
			<div class=" main-content-area">
				<div class=" summary-item wrap-address-billing">
					<form method="POST" action="{{route('addcomdpost.post')}}">
						{{ csrf_field() }}
						<p class="row-in-form">
							<label for="fname">Nom :<span>*</span></label>
							<input id="fname" type="text" name="fname" value="" placeholder="Votre Nom">
						</p>
						<p class="row-in-form">
							<label for="lname">Prenom :<span>*</span></label>
							<input id="lname" type="text" name="lname" value="" placeholder="Votre Prenom">
						</p> 
						<p class="row-in-form">
							<label for="phone">numéro de téléphone :<span>*</span></label>
							<input id="phone" type="number" name="phone" value="" placeholder="numéro de téléphone">
						</p>
						<p class="row-in-form">
							<label for="add">Adresse :</label>
							<input id="add" type="text" name="adr" value="" placeholder="Adresse...">
						</p> 
						<div class="row-in-form">
							<p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">{{$total}}DH</span></p>
							<input type="submit" class="btn btn-medium" value="Commander">
						</div> 
					</form>
				</div>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@include('partials.footer')