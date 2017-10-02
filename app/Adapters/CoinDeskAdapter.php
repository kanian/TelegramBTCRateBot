<?php
namespace App\Adapters;

use GuzzleHttp\Client;
/**
 * Description of CoinDeskService
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CoinDeskAdapter {
    
    private $api_url = "";
    private $default_currency = "";
    private $http_client;
    
    public function __construct(string $api_url, string $default_currency = 'USD') {
        $this->api_url = $api_url;
        $this->default_currency = $default_currency;
        $this->http_client = new Client([
            'base_uri' => $api_url,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
    
    public function getCurrentBTCRate(string $currency): float {
        $_currency = ($currency == NULL) ? $this->default_currency : $currency;
        // Format is http://[api_url]/currentprice/[currency_code].json
        $action = 'currentprice/'.$_currency.'.json';
        // Make HTTP request
        $response = $this->http_client->request('GET', $action);
        // Parse HTTP response
        if($response->isSuccessful()){
            $parsedResponse = new CoinDeskServiceConversionResponse($response->getBody());
            // Get the BTC rate to the currency
            return $parsedResponse->getBTCRate($currency);
        } else{
            // Something whent wrong; return a negative float to indicate it.
            return -1.0;
        }
        
    }
}
