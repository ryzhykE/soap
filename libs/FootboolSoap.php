<?php

class FootboolSoap
{
    protected $client;

    public function __construct()
    {
        try {
            $this->client = new SoapClient(FootboolS);
        }
        catch (SoapFault $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function getAllCards()
    {
        $result = $this->client->AllCards();
        $arr = $result->AllCardsResult->tCardInfo;
        return $arr;
    }
}