<?php
ini_set("soap.wsdl_cache_enabled", 0);

include_once ('config.php');
include_once ('libs/FootboolCurl.php');
include_once ('libs/BankCurl.php');

try
{
    $footbool = new FootboolCurl();
    $footbool = $footbool->getAllCards();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $date = $_POST['dateCurs'];
        date_default_timezone_set('EUrope/KIEV');

        if(strtotime($date) > strtotime(date("Y-m-d")))
        {
            echo WRONGD;
        }
        else
        {
            $bank = new BankCurl();
            $bank = $bank->getCursOnDate($date);
        }
    }
}
catch(Exception $e)
{
    $error = $e->getMessage();
}





include('template1.php');
