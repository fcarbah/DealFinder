<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;

/**
 * Description of EightCouponDeal
 *
 * @author FMCJr
 */
class EightCouponDeal extends Deal {
    
    public function __construct($eightCouponDeal){
        
        $this->setData($eightCouponDeal);
    }
    
    public function displayHtml(){
        
    }
    
    protected function setData($data) {
        $this->id = $data->ID;
        $this->title = $data->dealTitle;
        $this->name = $this->title;
        $this->phone = (isset($data->phone))? str_replace('.','-',$data->phone) : '';
        $this->image = $data->showImage;
        $this->address = (isset($data->address))? $data->address.' '.$data->address2.' '.$data->city.' '.$data->state.' '.$data->ZIP : '';
        $this->link = $data->URL;
        $this->source = $data->providerName;
        $this->description = (isset($data->dealinfo))? $data->dealinfo : '';
        $this->disclaimer = (isset($data->disclaimer))? $data->disclaimer : '';
        $this->price= $data->dealPrice;
        $this->savings = $data->dealSavings;
        $this->discount = $data->dealDiscountPercent;
        $this->origPrice = $data->dealOriginalPrice;
        $this->postDate = $data->postDate;
        $this->expireDate = $data->expirationDate;
        $this->distance = (isset($data->distance))? $data->distance : '';
    }
    

    
}
