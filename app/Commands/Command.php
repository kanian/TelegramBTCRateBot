<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commands;

use GuzzleHttp\Client;

/**
 * Description of Command
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class Command {
    
    private $api_url = "";
    private $http_client;
    private $_command_bus = NULL;
    
    public function __construct(string $api_url) {
        $this->api_url = $api_url;
        $this->_command_bus = app('App\Adapters\CommandBusAdapter')->Instance();
        $this->http_client = new Client([
            'base_uri' => $api_url,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
    
    /**
     * Helper to Trigger other Commands.
     *
     * @param      $command
     * @param null $arguments
     *
     * @return mixed
     */
    protected function triggerCommand($command, $arguments = null)
    {
        return $this->getCommandBus()->execute($command, $arguments ?: $this->arguments, $this->update);
    }
    /**
     * Get this Command's CommandBus.
     *
     * @param      $command
     * @param null $arguments
     *
     * @return mixed
     */
    protected  function getCommandBus(){
        return $_command_bus;
    }
    
    public function jsonPostRequest($action, $parameters) {
        
        if (!$parameters) {
          $parameters = array();
        } else if (!is_array($parameters)) {
          error_log("Parameters must be an array\n");
          return false;
        }
        // Make HTTP request
        $response = $this->http_client->post($this->api_url.$action,[
            'json' =>  $parameters
        ]);
        
        return $response;
    }
    
    public function jsonGetRequest($action, $parameters) {
        
        if (!$parameters) {
          $parameters = array();
        } else if (!is_array($parameters)) {
          error_log("Parameters must be an array\n");
          return false;
        }
        // Make HTTP request
        $response = $this->http_client->get($this->api_url.$action,[
            'query' =>  $parameters,
            'headers'=>  ['Accept'     => 'application/json',]
        ]);
        
        return $response;
    }
    
    public function getRequest($action, $parameters) {
        
        if (!$parameters) {
          $parameters = array();
        } else if (!is_array($parameters)) {
          error_log("Parameters must be an array\n");
          return false;
        }
        // Make HTTP request
        $response = $this->http_client->get($this->api_url.$action,[
            'query' =>  $parameters,
        ]);
        
        return $response;
    }
    
    public function postRequest($action, $parameters) {
        
        if (!$parameters) {
          $parameters = array();
        } else if (!is_array($parameters)) {
          error_log("Parameters must be an array\n");
          return false;
        }
        //$this->http_client->request('GET', $action,$headers)
        // Make HTTP request
        $response = $this->http_client->post($this->api_url.$action,[
            'form_params' =>  $parameters
        ]);
        
        return $response;
    }
}
