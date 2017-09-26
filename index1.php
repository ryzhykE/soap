<?php
ini_set("soap.wsdl_cache_enabled", 0);

include_once ('config.php');
include_once ('libs/FootboolCurl.php');
include_once ('libs/BankCurl.php');

//$footbool = new FootboolCurl();
//$footbool = $footbool->getAllCards();

$bank = new BankCurl();
$bank = $bank->getCursOnDate();

var_dump($bank);

include('template1.php');
