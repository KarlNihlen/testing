<?php
require("vendor/autoload.php");
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use GuzzleHttp\Client;

// Skapa en HTTP-client
$client = new Client();

// Anropa URL: http://unicorns.idioti.se/
$res = $client->request('GET', 'http://unicorns.idioti.se/');

// Omvandla JSON-svar till datatyper
$data = json_decode($res->getBody());
echo $res->getBody();
?>
