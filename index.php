<?php
ini_set("soap.wsdl_cache_enabled", 0);

include_once ('config.php');
include_once ('libs/FootboolSoap.php');
include_once ('libs/BankSoap.php');

try
{
    $res = new FootboolSoap();
    $result = $res->getAllCards();

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
            $bank = new banksoap();
            $bank = $bank->getcursondate($date);
        }

    }
}
catch(Exception $e)
{
    $error = $e->getMessage();
}



include('template.php');
