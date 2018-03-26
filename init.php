<?php
// ====================================================================
// =importazione classi di riferimento=
// ====================================================================
require('IGFS_CG_API/init/IgfsCgInit.php');
// ====================================================================
// = impostazione parametri per l’inizializzazione richiesta di=
// = pagamento.=
// = NB: I parametri riportati sono solo a titolo di esempio=
// ====================================================================
$init = new IgfsCgInit();
$init->serverURL = "https://testuni.netsw.it/UNI_CG_SERVICES/services";

if($init->serverURL == "https://testuni.netsw.it/UNI_CG_SERVICES/services"){
    $init->disableCheckSSLCert();	
}
$init->timeout = 15000;
$init->tid = "UNI_ECOM";
$init->kSig = "UNI_TESTKEY";
$init->shopID = time(); //$paymentData['cart_id']; //$cart_id  . strtotime($date);
$init->shopUserRef = "UNIBO";
$init->trType = "AUTH";
$init->currencyCode = "EUR";
$init->amount = 100; //str_replace('.', '', number_format($paymentData['amount'], 2, '.', ''));
$init->langID = "IT";
$init->notifyURL = 'http://0.0.0.0:8080/notify.php';// "https://merchant/notify.php";
$init->errorURL = 'http://0.0.0.0:8080/error.php';//"https://merchant/error.php";
//====================================================================
//=esecuzione richiesta di inizializzazione=
// /====================================================================

if(!$init->execute()) {
// ====================================================================
// = redirect del client su pagina di errore definita dall’esercente =
// ====================================================================
header("Location: error.php?rc=".urlencode($init->rc)."&errorDesc=".urlencode($init->errorDesc));
return;
}

//echo $init->paymentID; exit;

// NOTA: Salvo il $init->paymentID relativo alla richiesta (es. sul DB)...
// ====================================================================
// =redirect del client verso URL Pagonline BuyNow=
// =========================================
header("Location: ".$init->redirectURL);
?>