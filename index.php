<html>
  <head>
    <link rel="stylesheet" type="text/css" href="background.css">
  </head>


<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Laboration 1');
$log->pushHandler(new StreamHandler('greetings.log', Logger::INFO));
$log->info("xD");
?>
</html>
