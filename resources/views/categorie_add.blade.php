@include('partials.header')
	<!--main area-->
	<div class="ctn container">
        <div class=" main-content-area">
            <div class="summary-item wrap-address-billing">
                <h3 class="box-title">Ajouter Categorie</h3>
                <form method="POST" action="{{route('addcat.post')}}">
                    {{ csrf_field() }}
                    <p class="row-in-form">
                        <label for="libelle">libellé<span>*</span></label>
                        <input id="libelle" type="text" name="libelle" value="" placeholder="libellé">
                    </p>
                    <input type="submit" value="Ajouter" class="btn btn-medium"/>
                </form>
            </div>
        </div>
    </div>
	<!--main area-->

@include('partials.footer')