<?php
use App\Paypal\Paypal;

require_once "../app/classe.php";
if($ajax->is_ajax()){
    if(isset($_POST['action']) && $_POST['action'] == 'simple-payment'){
        $libelle_article = $_POST['libelle_article'];
        $total_ttc = $_POST['total_ttc'];

        $paypal = new Paypal();
        $params = array(
            "RETURNURL"     => $redirect->racine().'/controller/paypal.php?action=payment_transfer',
            "CANCELURL"     => $redirect->racine().'/index.php?view=checkout&error=Paiement Annulée par l\'utilisateur',

            "PAYMENTREQUEST_0_AMT"          => $total_ttc,
            "PAYMENTREQUEST_0_CURRENCYCODE" => "EUR",
            "PAYMENTREQUEST_0_ITEMAMT"      => $total_ttc,
            "PAYMENTREQUEST_0_DESC"         => $libelle_article,

            "LOGOIMG"                       => $redirect->getUrl(array("images", "logo/")).'logo.png',
            "BRANDNAME"                     => "LA MEGISSERIE",
        );
        $reponse = $paypal->request('SetExpressCheckout', $params);
        if($reponse){
            echo $reponse['TOKEN'];
        }else{
            echo $paypal->error;
            die('ERREUR');
        }
    }
}