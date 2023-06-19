<?php
// Connection and decoding
$urlContentA = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/a/');
$urlContentB = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/b/');
$apiTableA = json_decode($urlContentA, true);
$apiTableB = json_decode($urlContentB, true);


$ratesArrayA = $apiTableA[0];
$ratesA = $ratesArrayA['rates'];

$ratesArrayB = $apiTableB[0];
$ratesB = $ratesArrayB['rates'];
