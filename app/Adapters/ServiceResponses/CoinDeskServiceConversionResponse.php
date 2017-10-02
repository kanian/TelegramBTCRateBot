<?php
namespace App\Adapters\ServiceResponses;

/**
 * Description of CoinDeskServiceConversionResponse
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CoinDeskServiceConversionResponse extends CoinDeskServiceResponse {
    
    public function __construct(string $jsonResponseString) {
        parent::__construct($jsonResponseString);
    }
    
    public function getBTCRate(string $currency) : float{
        if($this->getResponse() !== NULL && $this->getResponse() !== false){
           $this->getResponse()[$currency]->rate_float; 
        } else{
            // Request failed 
            return -1.0;
        }
    }
    
}
