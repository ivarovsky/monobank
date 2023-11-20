<?php class monobank 
  {
    private $testing_mode = 1;
    private $api_link = "https://api.monobank.ua/";
    private function check_signature($params){}

    private function send_data_to_monobank($params,$action,$key)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // Avoid MITM vulnerability http://phpsecurity.readthedocs.io/en/latest/Input-Validation.html#validation-of-input-sources
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);    // Check the existence of a common name and also verify that it matches the hostname provided
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);   // The number of seconds to wait while trying to connect
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);          // The maximum number of seconds to allow cURL functions to execute
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Token"=>$key]);
        $server_output = curl_exec($curl);
        $this->_server_response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $server_output;
    }
    
    public function create_payment_button($data){}
    
  }
