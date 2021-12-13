<?php

namespace App\lib;
use App\Search;
use App\Setting;
use DB;

/**
 * This is just an example.
 */
class Mellat_Bank
{
    public $TerminalId;
    public $UserName;
    public $Password;
    public function __construct()
    {

        $this->TerminalId=Setting::get_value('TerminalId');
        $this->UserName=Setting::get_value('Username');
        $this->Password=Setting::get_value('Password');

    }
    public function pay($amount)
    {
        $client = new \nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $namespace='http://interfaces.core.sw.bps.com/';
        $error = $client->getError();
        if($error)
        {
            return false;
        }
        $parameters = array(
            'terminalId' =>$this->TerminalId,
            'userName' =>$this->UserName,
            'userPassword' =>$this->Password,
            'orderId' =>time(),
            'amount' => $amount,
            'localDate' =>date("Ymd"),
            'localTime' =>date("His"),
            'additionalData' =>'خرید',
            'callBackUrl' =>'http://www.idehpardazanjavan.com/digikala/public/order',
            'payerId' =>0
        );
        $result = $client->call('bpPayRequest', $parameters, $namespace);
        var_dump($result);
        $res=@explode(',',$result);
        if(sizeof($res)==2)
        {
            if($res[0]==0)
            {
                return $res[1];
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function Verify($SaleOrderId,$SaleReferenceId)
    {
        $client =new \nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $namespace='http://interfaces.core.sw.bps.com/';
        $error = $client->getError();
        if($error)
        {
            return false;
        }
        $parameters = array
        (
            'terminalId' =>$this->TerminalId,
            'userName' =>$this->UserName,
            'userPassword' =>$this->Password,
            'orderId' => $SaleOrderId,
            'saleOrderId' => $SaleOrderId,
            'saleReferenceId' => $SaleReferenceId
        );
        $VerifyAnswer = $client->call('bpVerifyRequest', $parameters,$namespace);
        if($VerifyAnswer==0)
        {
            $result=$client->call('bpSettleRequest', $parameters,$namespace);
            return true;
        }
        else
        {
            $this->Inquiry($SaleOrderId,$SaleReferenceId);
        }
    }
    public function Inquiry($SaleOrderId,$SaleReferenceId)
    {
        $client =new \nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $namespace='http://interfaces.core.sw.bps.com/';
        $error = $client->getError();
        if($error)
        {
            return false;
        }
        $parameters = array
        (
            'terminalId' =>$this->TerminalId,
            'userName' =>$this->UserName,
            'userPassword' =>$this->Password,
            'orderId' => $SaleOrderId,
            'saleOrderId' => $SaleOrderId,
            'saleReferenceId' => $SaleReferenceId
        );
        $Inquiry = $client->call('bpInquiryRequest', $parameters,$namespace);
        if($Inquiry==0)
        {
            $result=$client->call('bpSettleRequest', $parameters,$namespace);
            return true;
        }
        else
        {
            $result=$client->call('bpReversalRequest', $parameters,$namespace);
            return false;
        }
    }
}
