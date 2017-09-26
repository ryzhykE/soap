<?php
ini_set("soap.wsdl_cache_enabled", 0);

include_once ('config.php');
include_once ('libs/FootboolSoap.php');
include_once ('libs/BankSoap.php');


$res = new FootboolSoap();
$result = $res->getAllCards();

if($_server['request_method'] == "post")
{
    $date = $_post['datecurs'];
    date_default_timezone_set('europe/kiev');
    
    if(strtotime($date) > strtotime(date("y-m-d")))
    {
        echo wrongd ;
    }
    else
    {
        $bank = new banksoap();
        $bank = $bank->getcursondate($date);
    }

}

include('template.php');
