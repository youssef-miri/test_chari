@include('partials.header')
	<!--main area-->
	<div class="ctn container">
        <div class=" main-content-area">
            <div class="summary-item wrap-address-billing">
                <h3 class="box-title">Ajouter Produit</h3>
                <form method="POST" action="{{route('addproduit.post')}}">
                    {{ csrf_field() }}
                    <p class="row-in-form">
                        <label for="reference">référence<span>*</span></label>
                        <input id="reference" type="text" name="ref" value="" placeholder="référence">
                    </p>
                    <p class="row-in-form">
                        <label for="libelle">libellé<span>*</span></label>
                        <input id="libelle" type="text" name="libelle" value="" placeholder="libellé">
                    </p>
                    <p class="row-in-form">
                        <label for="pu">prix unitaire<span>*</span></label>
                        <input id="pu" type="number" name="pu" value="" placeholder="prix unitaire.">
                    </p>
                    <p class="row-in-form">
                        <label for="qte"> Qte disponibles en stock<span>*</span></label>
                        <input id="qte" type="number" name="qte" value="" placeholder="Qte disponibles en stock">
                    </p>
                    <p class="row-in-form">
                        <label for="categorie">Categorie<span>*</span></label>
                        <select class="form-control" name="id_cat" id="categorie">
                            <option value="0" disabled="true" selected="true">Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                            @endforeach
                          </select>
                    </p>
                    <p class="row-in-form">
                        <label for="categorie">TVA<span>*</span></label>
                        <select class="form-control" name="tva" id="categorie">
                            <option value="0" disabled="true" selected="true">TVA</option>
                                <option value="0">0%</option>
                                <option value="7">7%</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                        </select>
                    </p>
                    <input type="submit" value="Ajouter" class="btn btn-medium"/>
                </form>
            </div>
        </div>
    </div>
	<!--main area-->
@include('partials.footer')