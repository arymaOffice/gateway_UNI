echo $payment_id = $PayObj->verifyPayment();
if($payment_id){
//write your logic after success payment.
}else{
//error
}<?php
// ====================================================================
// =importazione classi di riferimento=
// ====================================================================
require('IGFS_CG_API/init/IgfsCgVerify.php');
// ====================================================================
// = impostazione parametri per l’inizializzazione richiesta di=
// = pagamento.=
// = NB: I parametri riportati sono solo a titolo di esempio=
// ====================================================================
$verify = new IgfsCgVerify();
$verify->serverURL = "https://testuni.netsw.it/UNI_CG_SERVICES/services";
$verify->timeout = 15000;
$verify->tid = "123456";
$verify->kSig = "ondkmctaf9/MI3I5AZ4LskbmRiw=";
$verify->shopID = "5687010820272485455";
$verify->paymentID = // NOTA: Leggo il paymentID rilasciato in fase di init(es. dal DB)...
$errorURL = "https://merchant/error.php";
$esitoURL = "https://merchant/esito.php";
//====================================================================
//=esecuzione richiesta di verifica=
//====================================================================
if(!$verify->execute()) {
// ====================================================================
// = redirect del client su pagina di errore definita dall’esercente =
// ====================================================================
header("location: ".$errorURL . "?rc=" . $verify->rc . "&errorDesc=" .
$verify->errorDesc);
return;
}
// ====================================================================
// =redirect del client verso URL Esito Pagamento Merchant =
// ====================================================================
header("location: ".$esitoURL . "?esito=OK&rc=" . $verify->rc . "&tranID="
. $verify->tranID . "&enrStatus=" . $verify->enrStatus . "&authStatus=" .
$verify->authStatus);
?>