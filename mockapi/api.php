<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');
$req = $app->request;
$accept = $app->request->headers->get('ACCEPT');

//die ($accept);
/*if ($accept !== "application/json") {
    try {
        $response = array(
        "responseCode"      => "403",
        "responseMessage"   => "method not allowed"
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';
    } catch (Exception $e) {

    }
    die;
}
*/


$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

//:data_inizio/:data_fine:/:tipo_barca/:lunghezza/:larghezza/:pescaggio/:servizi_aggiuntivi
$app->get('/getPrice', function () use ($req){

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Test Message",
        "data"              => array("prezzo" => "22,22€")
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


$app->get('/requestReservation', function ()  use ($req){

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Test Message",
        "data"              => array("codice_prenotazione" => "AMSDJDF89823NN4")
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


$app->get('/confirmReservation', function () use ($req) {

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Everything fine",
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});

$app->get('/getReservations', function () use ($req) {

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Everything fine",
        "data"              => array(
            array(
                    "codice_prenotazione" =>   "ASDKASMKMK7346",
                    "status"              =>   "pending", // accettata respinta confermata
                    "data_inizio"         =>    "20-09-2016",
                    "data_fine"           =>    "20-10-2016",
                    "dettagli_barca"      =>    array(
                                                    "pescasggio" => "11",
                                                    "lunghezza"  => "23",
                                                    "larghezza"  => "7",
                                                    "tipo_barca" => "A",
                                                     "superficie_velica"  => "23"
                                                )
                ),
            array(
                "codice_prenotazione" =>   "JIGGGJNJNJNGJNJNG88",
                "status"              =>   "accettata", // accettata respinta confermata
                "data_inizio"         =>    "20-01-2016",
                "data_fine"           =>    "20-10-2016",
                "dettagli_barca"      =>    array(
                    "pescasggio" => "21",
                    "lunghezza"  => "3",
                    "larghezza"  => "7",
                    "tipo_barca" => "G",
                    "superficie_velica"  => "23"
                )
            ),
            array(
                "codice_prenotazione" =>   "JKSFJKSDFDF8AAA1",
                "status"              =>   "respinta", // accettata respinta confermata
                "data_inizio"         =>    "20-09-2015",
                "data_fine"           =>    "20-01-2016",
                "dettagli_barca"      =>    array(
                    "pescasggio" => "1",
                    "lunghezza"  => "13",
                    "larghezza"  => "5",
                    "tipo_barca" => "A",
                    "superficie_velica"  => "23"
                )
            ),
            array(
                "codice_prenotazione" =>   "SDFGBSDFGHSDJJL345234",
                "status"              =>   "confermata", // accettata respinta confermata
                "data_inizio"         =>    "20-03-2016",
                "data_fine"           =>    "20-07-2016",
                "dettagli_barca"      =>    array(
                    "pescasggio" => "4",
                    "lunghezza"  => "43",
                    "larghezza"  => "17",
                    "tipo_barca" => "c",
                    "superficie_velica"  => "23"

                )
            )
        )
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


$app->get('/getReservationInfo', function () use ($req) {

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Everything fine",
        "data"              => array(

            "codice_prenotazione" =>   "ASDKASMKMK73466734674",
            "status"              =>   "pending",
            "data_inizio"         =>    "20-09-2016",
            "data_fine"           =>    "20-10-2016",
            "dettagli_barca"      =>    array(
                "pescasggio" => "11",
                "lunghezza"  => "23",
                "larghezza"  => "7",
                "tipo_barca" => "A",
                "superficie_velica"  => "23"
            )
        )
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


// a seconda del parametro restituisce il codice di errore o meno (il parametro code non è previsto nelle api ufficiali)
$app->get('/retrievePassword(/:code)', function ($code = 0) use ($req) {
    if ($code == 1) {
        $response = array(
            "responseCode"      => "200",
            "responseMessage"   => "Everything fine"
        );
    } else  {
        $response = array(
            "responseCode"      => "404",
            "responseMessage"   => "Indirizzo email inesistente"
        );
    }

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});

// a seconda del parametro restituisce il codice di errore o meno (il parametro code non è previsto nelle api ufficiali)
$app->get('/login(/:code)', function ($code = 0) use ($req) {
    if ($code == 1) {
        $response = array(
            "responseCode"      => "200",
            "responseMessage"   => "Everything fine",
            "data"              => array(
                    "session_token" => "XXXXXXXX",
                    "user_id"       => "188772"
            )
        );
    } else  {
        $response = array(
            "responseCode"      => "404",
            "responseMessage"   => "Impossibile autenticarsi. Username e/o password non corretti",

        );
    }

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});

// a seconda del parametro restituisce il codice di errore o meno (il parametro code non è previsto nelle api ufficiali)
$app->get('/register/:nome/:cognome(/:code)', function ($nome, $cognome, $code = 0) use ($req) {
    if ($code == 1) {
        $response = array(
            "responseCode"      => "201", // created
            "responseMessage"   => "Una email è stata inviata all’indirizzo mail indicato in fase di registrazione...",
        );
    } else  {
        $response = array(
            "responseCode"      => "400", // bad request
            "responseMessage"   => "mpossibile registrarsi con l’indirizzo email specificato...è già presente in archivio",

        );
    }

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


$app->get('/logout', function ($code = 0) use ($req) {

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Logout effettuato con successo",
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});


$app->get('/getUserInfo', function () use ($req) {

    $response = array(
        "responseCode"      => "200",
        "responseMessage"   => "Logout effettuato con successo",
        "data"              => array(
            "nome"          => "Carlo",
	        "cognome"       =>  "Giacomi",
	        "email"         =>  "test@test.com",
	        "indirizzo"     =>  "via XX settembre 77",
	        "ultimo_login"  => "20-11-2015T15:00:00",
	        "avatar"        => "http://mydomain.it/avatar.jpg",
	        "boat"          => array(
                "pescaggio"  => "11",
                "lunghezza"  => "23",
                "larghezza"  => "7",
                "tipo_barca" => "A",
                "superficie_velica"  => "23"
                )
        )
    );

    $callback = $req->get("callback");
    echo $callback . '(' . json_encode($response) . ');';

});

$app->run();

