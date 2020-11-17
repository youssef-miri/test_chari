@include('partials.header')
<!--main area-->
<div class="ctn container">
    <div class="summary-item wrap-iten-in-cart">
        <h3 class="box-title">Commande id:{{ $comdd->id }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id_produit</th>
                <th scope="col">Libelle produit</th>
                <th scope="col">Prix V av P HT</th>
                <th scope="col">promotion</th>
                <th scope="col">Prix V ap P HT</th>
                <th scope="col">TVA</th>
                <th scope="col">Prix V ap P TTC</th>
                <th scope="col">Qte</th>
                <th scope="col">Prix total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ligneComds as $l)
            <tr>
                <th scope="row">{{ $comdd->id }}</th>
                <td>{{ $l->id_art }}</td>
                <td>{{ $l->libelle_art }}</td>
                <td>{{ $l->pu }}</td>
                <td>@isset($l->pourcentage){{ $l->pourcentage }}% @endisset</td>
                <td>{{ $l->pr }}</td>
                <td>{{ $l->tva }}</td>
                <td>{{ $l->prix_tva }}</td>
                <td>{{ $l->qte }}</td>
                <td>{{ $l->total_ttc }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="summary">
            <div class="order-summary">
                <p class="summary-info total-info "><span class="title">Montant total de la commande </span><b class="index">{{ $comdd->total }}</b></p>
            </div>
        </div>
    </div>
</div>
<!--main area-->
@include('partials.footer')
