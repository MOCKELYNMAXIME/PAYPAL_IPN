<?php if(!isset($_GET['sub'])): ?>

    <div class="container clearfix">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#simple-payment">Effectuer un paiement Simple</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#multiple-payment">Effectuer un paiement en plusieurs fois</button>
            </div>
        </div>
    </div>

<?php endif; ?>
