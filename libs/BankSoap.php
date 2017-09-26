<?php

class BankSoap
{
    protected $client;

    public function __construct()
    {
        try {
            $this->client = new SoapClient(BankS);
        }
        catch (SoapFault $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function getCursOnDate($date)
    {
        $params = ['On_date' => $date];
        $res = $this->client->GetCursOnDate($params);
        $parsing = new SimpleXMLElement($res->GetCursOnDateResult->any);
        $arr = $parsing->ValuteData->ValuteCursOnDate;
        return $arr;
    }
}