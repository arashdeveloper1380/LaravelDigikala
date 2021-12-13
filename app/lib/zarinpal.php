<?php
namespace App\lib;
use App\Setting;

class zarinpal
{
    public $MerchantID;
    public function __construct()
    {
        $this->MerchantID=Setting::get_value('MerchantID');
    }
    public function pay($amount,$Email,$Mobile)
    {
        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = 'UserEmail@Mail.Com';
        $Mobile = '09123456789';
        $CallbackURL = 'http://www.idehpardazanjavan.com/digikala/public/order'; // Required


        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

        if ($result->Status == 100)
        {
            return $result->Authority;
        }
        else
        {
          return false;
        }
    }
    public function Verify($amount,$Authority)
    {
        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
            [
                'MerchantID' => $this->MerchantID,
                'Authority' => $Authority,
                'Amount' => $amount,
            ]
        );

        if ($result->Status == 100)
        {
            return $result->RefID;
        }
        else
        {
            return false;
        }


    }
}