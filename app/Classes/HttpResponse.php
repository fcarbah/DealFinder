<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;

/**
 * Description of HttpResponse
 *
 * @author FMCJr
 */
class HttpResponse {
    
    public $hasError;
    public $errorMessage;
    public $data;
    
    public function __construct() {
        $this->hasError = false;
        $this->errorMessage ='';
        $this->data = null;
    }
}
