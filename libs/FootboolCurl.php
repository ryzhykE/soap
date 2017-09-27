<?php

class FootboolCurl
{
    private $curl;
    private $soapUrl = "http://footballpool.dataaccess.eu/data/info.wso?op=AllCards";

    public $xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <AllCards xmlns="http://footballpool.dataaccess.eu">
            </AllCards>
          </soap:Body>
          </soap:Envelope>';



    private $headers = array (
        "Host: footballpool.dataaccess.eu",
        "Cache-Control: no-cache",
        "Content-Type: text/xml; charset=utf-8",
   );

    public function __construct() {
        $this->curl = curl_init();
    }

    public function getAllCards()
    {
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($this->curl, CURLOPT_URL, $this->soapUrl);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->xmlPostString);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);

        $response = curl_exec($this->curl);
        curl_close($this->curl);

        $response1 = str_replace("<soap:Body>","",$response);
        $response2 = str_replace("</soap:Body>","",$response1);
        $response3 = str_replace("<m:AllCardsResult>","",$response2);
        $response4 = str_replace("</m:AllCardsResult>","",$response3);

        $cards = new SimpleXMLElement($response4);
        return $cards;
    }
}
