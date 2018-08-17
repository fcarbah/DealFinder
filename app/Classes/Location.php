<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Unirest;
/**
 * Description of Location
 *
 * @author FMCJr
 */
class Location {
    
    public $latitude;
    public $longitute;
    public $city;
    public $region;
    public $zip;
    public $country;
    
    public function getFromIp($ipAddress=null){
        
        $ip = ($ipAddress != null)? $ipAddress : \Request::ip();
        
        if(preg_match('/^(127)|(::1)$/',$ip)){
            $ip = '98.174.86.36';
        }

        return \Cache::remember($ip,1200,function() use ($ip){
            
            $url = 'http://api.ipinfodb.com/v3/ip-city/';
            $key = 'f9dddd8071847860594138bc821fe140bb8f0fe05e6688d23f2d2264d83fb3eb';
            
            $response = HttpRequest::_request($url, ['key'=>$key,'ip'=>$ip,'format'=>'json']);

            if(!$response->hasError){
                $this->setInfo($response->data); 
            }
            
            return $this;
        });
    }
    
    private function setInfo($info){
        $this->latitude = $info->latitude;
        $this->longitute = $info->longitude;
        $this->city = $info->cityName;
        $this->country = $info->countryName;
        $this->zip = $info->zipCode;
        $this->region = $info->regionName;
    }
}
