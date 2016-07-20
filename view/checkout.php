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
    <div class="modal fade" id="simple-payment" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Paiement Unitaire</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <img src="<?= $redirect->getIcon('ecommerce', 'credit-card', 'png'); ?>" width="150" class="img-responsive img-circle" alt="">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<?php endif; ?>
