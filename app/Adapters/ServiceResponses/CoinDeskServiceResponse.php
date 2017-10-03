<?php
namespace App\Adapters\ServiceResponses;

/**
 * Description of CoinDeskServiceResponse
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CoinDeskServiceResponse {
    
    private $parsedResponse = false;
    
    private function parseJSONResponse(string $jsonResponseString){
       $this->parsedResponse =  json_decode($jsonResponseString,true);
    }
    
    public function __construct(string $jsonResponseString) {
        $this->parseJSONResponse($jsonResponseString);
    }
    
    public function getResponse() {
        return $this->parsedResponse;
    }
}
