@include('partials.header')
	<!--main area-->
	<div class="ctn container">
        <div class=" main-content-area">
            <div class="summary-item wrap-address-billing">
                <h3 class="box-title">Ajouter Promotion</h3>
                <form method="POST" action="{{route('addprom.post')}}">
                    {{ csrf_field() }}
                    <p class="row-in-form">
                        <label for="libelle">libellé<span>*</span></label>
                        <input id="libelle" type="text" name="libelle" value="" placeholder="libellé">
                    </p>
                    <p class="row-in-form">
                        <label for="debut">Début<span>*</span></label>
                        <input id="debut" type="text" name="from" value="" placeholder="Début">
                    </p>
                    <p class="row-in-form">
                        <label for="fin">Fin<span>*</span></label>
                        <input id="fin" type="text" name="to" value="" placeholder="Fin">
                    </p> 
                    <input type="submit" value="Ajouter" class="btn btn-medium"/>
                </form>
            </div>
        </div>
    </div>
	<!--main area-->
@include('partials.footer')