<?php

class BankCurl
{
    private $curl;
    private $soapUrl = "http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?op=GetCursOnDate";

    private $xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <GetCursOnDate xmlns="http://web.cbr.ru/">
                        <On_date>2017-09-25</On_date>
                            </GetCursOnDate>
                                </soap:Body>
                                    </soap:Envelope>';


    private $headers = [
        //"POST /DailyInfoWebServ/DailyInfo.asmx HTTP/1.1",
        "Host: www.cbr.ru",
        "Content-Type: text/xml; charset=utf-8",
        "SOAPAction: http://web.cbr.ru/GetCursOnDate",
        ];

    public function __construct() {
        $this->curl = curl_init();
    }

    public function getCursOnDate()
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
       // $response3 = str_replace("<m:GetCursOnDate>","",$response2);
       // $response4 = str_replace("</m:GetCursOnDate>","",$response3);
        $response3 = str_replace("diffgr:","",$response2);
        var_dump($response2);

        $bank = new SimpleXMLElement($response3);
        return $bank;
    }

}
