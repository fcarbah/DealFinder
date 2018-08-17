<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Unirest\Request as RequestClient;
/**
 * Description of HttpRequest
 *
 * @author FMCJr
 */
class HttpRequest {
    
    public $hasError;
    public $errorMessage;
    public $data;
    
    private $response;
    
    public function __construct() {
        $this->response = new HttpResponse();
    }
    
    /**
     * Make call to api
     * @param string $url
     * @param array $body
     * @param array $headers
     * @param string $method
     * @return App\Classes\HttpResponse
     */
    public function request($url,$body=[],$headers=[],$method="GET"){

        RequestClient::verifyPeer(false);

        $response = RequestClient::send($method, $url, $body, $headers);
        
        if($response == null || $response->code!=200 || isset($response->body->error)){
            $this->response->hasError = true;
            $this->response->errorMessage = $response->raw_body;
        }
        else{
            $this->response->data = $response->body;
        }
        
        return $this->response;
    }
    
    /**
     * Make call to api
     * @param string $url
     * @param array $body
     * @param array $headers
     * @param string $method
     * @return App\Classes\HttpResponse
     */
    public static function _request($url,$body=[],$headers=[],$method="GET"){
        $request = new HttpRequest();
        return $request->request($url, $body, $headers, $method);

    }
    
}
