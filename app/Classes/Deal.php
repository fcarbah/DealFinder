<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;

/**
 * Description of Deal
 *
 * @author FMCJr
 */
abstract class Deal {
    
    public $title;
    public $id;
    public $expireDate;
    public $postDate;
    public $link;
    public $name;
    public $image;
    public $description;
    public $price;
    public $savings;
    public $discount;
    public $distance;
    public $phone;
    public $address;
    public $source;
    public $origPrice;
    public $disclaimer;
    
    public abstract function displayHtml();
    protected abstract function setData($data);
    
}
