<?php
namespace App\Adapters;

use GuzzleHttp\Client;
use App\Adapters\ServiceResponses\CoinDeskServiceConversionResponse;
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
        $headers=  ['Accept'     => 'application/json',];
        // Make HTTP request
        $response = $this->http_client->request('GET', $action,$headers);
        // Parse HTTP response
        if($response->getStatusCode() == '200'){
            $parsedResponse = new CoinDeskServiceConversionResponse($response->getBody()->getContents());
            // Get the BTC rate to the currency
            return $parsedResponse->getBTCRate($currency);
        } else{
            // Something whent wrong; return a negative float to indicate it.
            return -1.0;
        }
        
    }
}
