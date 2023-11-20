<?php 
///////////////////////////////////////////////////////////////////

// Created by Senya Ivarovskyi for personal use
// If you have any questions, please send me email ivarovskii@ukr.net

// OFFICIAL API DOCS HERE: https://api.monobank.ua/docs/acquiring.html

///////////////////////////////////////////////////////////////////

class monobank 
  {
    private $testing_mode = 1;
    private $api_link = "https://api.monobank.ua/";
    private $redirectUrl = "";
    private $webHookUrl = "";
    
    private function check_signature($params){}

    private function send_data_to_monobank($params,$action,$key)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->api_link.$action);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // Avoid MITM vulnerability http://phpsecurity.readthedocs.io/en/latest/Input-Validation.html#validation-of-input-sources
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);    // Check the existence of a common name and also verify that it matches the hostname provided
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);   // The number of seconds to wait while trying to connect
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);          // The maximum number of seconds to allow cURL functions to execute
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Token"=>$key]);
        $server_output = curl_exec($curl);
        $this->_server_response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $server_output;
    }
    
    public function create_payment_button($data,$key)
    {
     if(!isset($data['amount'])) {echo "Amount not set" exit();} //Check Required Field
      if(!isset($data['ccy'])) $data['ccy'] = 980;
      if(!isset($data['redirectUrl'])) $data['redirectUrl'] =$this->redirectUrl;
      if(!isset($data['webHookUrl'])) $data['webHookUrl'] =$this->webHookUrl;
      if(!isset($data['validity'])) $data['validity'] =3600;
      if(!isset($data['paymentType'])) $data['paymentType'] ="debit";

      
    $pay_link = send_data_to_monobank($data,"api/merchant/invoice/create",$key);
    if(strlen($pay_link))  return "<a href='{$pay_link}' ><button>PAY</button></a>";
    else return "Something went wrong!";
    }
    
  }


