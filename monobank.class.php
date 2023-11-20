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
    private $_server_response_code = null;
    private function check_signature($params){}
	
	    private function send_data_to_monobank($params,$action,$key)
    {
		    if(is_array($params)) $params = json_encode($params);
	      $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->api_link.$action);
		    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-Token: {$key}","Content-Type: application/json","Content-Length: ".strlen($params)]);
        $server_output = curl_exec($curl);
        $this->_server_response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    		return $server_output;
	}
	
	   public function create_payment_button($data,$key)
    {
      if(!isset($data['amount'])) {echo "Amount not set"; exit();} //Check Required Field
      if(!isset($data['ccy'])) $data['ccy'] = 980;
      if(!isset($data['redirectUrl'])) $data['redirectUrl'] = $this->redirectUrl;
      if(!isset($data['webHookUrl'])) $data['webHookUrl'] = $this->webHookUrl;
      if(!isset($data['validity'])) $data['validity'] = 3600;
      if(!isset($data['paymentType'])) $data['paymentType'] = "debit";
      $pay_link = $this->send_data_to_monobank($data,"api/merchant/invoice/create",$key);
	    $pay_link = json_decode($pay_link,1);
	    if(isset($pay_link) || strlen($pay_link['pageUrl'])>2)  return "<a href='{$pay_link['pageUrl']}' ><button>PAY</button></a>";
    else return json_encode($pay_link);
	  }
    
  }
