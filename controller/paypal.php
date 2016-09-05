<?php
use App\Api\Paypal;

require_once "../app/classe.php";
if($ajax->is_ajax()){
    if(isset($_POST['action']) && $_POST['action'] == 'simple-payment'){
        $libelle_article = $_POST['libelle_article'];
        $total_ttc = $_POST['total_ttc'];

        $sql = $db->getDatabase("execute", "INSERT INTO achat_unitaire(libelle_article, total_ttc) VALUES (:libelle_article, :total_ttc)", array(
            "libelle_article"   => $libelle_article,
            "total_ttc"         => $total_ttc
        ));
        $sql_accept = $db->getDatabase("query", "SELECT * FROM achat_unitaire ORDER BY id DESC LIMIT 1");
        $accept = $sql_accept[0];

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
            "PAYMENTREQUEST_0_INVNUM"       => $accept->id
        );
        $reponse = $paypal->request('SetExpressCheckout', $params);
        if($reponse){
            echo $reponse['TOKEN'];
        }else{
            echo json_encode($paypal->error);
            die('ERREUR');
        }
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'payment_transfer'){
    $token = $_GET['token'];
    $PayerID = $_GET['PayerID'];

    $paypal = new paypal();
    $reponse = $paypal->request('GetExpressCheckoutDetails', array("TOKEN" => $token));
    if($reponse){
        if($reponse['CHECKOUTSTATUS'] == 'PaymentActionCompleted'){
            Echo "Paiement déja effectuer";
        }
    }else{
        var_dump($paypal->error);
        die();
    }

    $params = array(
        "TOKEN"         => $token,
        "PAYERID"       => $PayerID,
        "PAYMENTACTION" => 'sale',

        "PAYMENTREQUEST_0_AMT"          => $reponse['PAYMENTREQUEST_0_AMT'],
        "PAYMENTREQUEST_0_CURRENCYCODE" => $reponse['PAYMENTREQUEST_0_CURRENCYCODE'],
        "PAYMENTREQUEST_0_ITEMAMT"      => $reponse['PAYMENTREQUEST_0_ITEMAMT'],
        "PAYMENTREQUEST_0_DESC"         => $reponse['PAYMENTREQUEST_0_DESC']
    );
    $response = $paypal->request('DoExpressCheckoutPayment', $params);
    if($response){
        header("Location: ../index.php?view=checkout&success=Paiement Accepter sous le Numéro ".$response['PAYMENTINFO_0_TRANSACTIONID']);
    }else{
        var_dump($paypal->error);
    }
}