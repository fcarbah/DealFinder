<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
/**
 * Description of EightCoupons
 *
 * @author FMCJr
 */
class EightCoupons {
    
    use \App\Traits\ResponseTrait;
    
    private $key;
    private $baseUrl;
    private $url;
    
    public function __construct() {
        $this->baseUrl='http://api.8coupons.com/v1/';
        $this->key = getenv('eightcoupons.key');
    }
     
    public function defaults(){
        return (object)['radius'=> \getRadius(),'limits'=>\getLimits(),'categories'=>$this->getCategories()];
    }
    
    public function getCategories(){
        
        return \Cache::remember('categories',600,function(){
            
            $this->url = $this->baseUrl.'getcategory';

            $categories = [];

            $response = HttpRequest::_request($this->url,['key'=>$this->key]);

            if(!$response->hasError){
                $categories = $this->formatCategories($response->data);
            }

            return $categories;
        });
        
    }
    
    public function getChainStores(){
       $this->url = $this->baseUrl.'chainstorelist'; 
    }
    
    public function getDealsByChainOrStore($type,$id){
        $this->url = $this->baseUrl.'getstoredeals';
    }
    
    /**
     * 
     * @param type $zip
     * @param type $page
     * @param type $radius
     * @param type $limit
     * @param type $category
     * @return App\Classes\HttpResponse
     */
    public function getDealsByLocation($zip='02893',$page=1,$radius=5,$limit=50,$category=0){
        
        $key = $this->generateKey($zip,$page,$radius,$limit,$category);
        
        return \Cache::remember($key,10,function() use ($zip,$page,$radius,$limit,$category){
            
            $this->url = $this->baseUrl.'getdeals';
            
            if($category == 0){
                $category = '';
            }
            
            $response = HttpRequest::_request($this->url,['key'=>$this->key,'zip'=>$zip,'mileradius'=>$radius,'limit'=>$limit,'page'=>$page,
                'categories'=>$category,'orderby'=>'radius']);
          
            if(!$response->hasError){
                $response->data = $this->createDeals($response->data);
            }
            else{
                $response->data=[];
            }
 
            return $response;
        });
    }
    
    public function getDealTypes(){
        $this->url = $this->baseUrl.'getdealtype';
    }
    
    /**
     * 
     * @param type $zip
     * @param type $page
     * @param type $radius
     * @param type $limit
     * @return App\Classes\HttpResponse
     */
    public function getRealtimeProductDeals($zip='02893',$page=1,$radius=20,$limit=4){
        
        $key = $this->generateKey('product',$zip,$page,$radius,$limit);
      
        return \Cache::remember($key,10,function() use ($zip,$page,$radius,$limit){
            
            $this->url = $this->baseUrl.'getrealtimeproductdeals';
            
            $response = HttpRequest::_request($this->url,['key'=>$this->key,'zip'=>$zip,'mileradius'=>$radius,'limit'=>$limit,'page'=>$page,'orderby'=>'radius']);

            if(!$response->hasError){
                $response->data = $this->createDeals($response->data);
            }
            else{
                $response->data=[];
            }

            return $response;
            
        });
    }
    
    /**
     * 
     * @param type $zip
     * @param type $page
     * @param type $radius
     * @param type $limit
     * @return App\Classes\HttpResponse
     */
    public function getRealtimeTravelDeals($zip='02893',$page=1,$radius=20,$limit=4){
        
        $key = $this->generateKey('travel',$zip,$page,$radius,$limit);
        
        return \Cache::remember($key,10,function() use ($zip,$page,$radius,$limit){
            
            $this->url = $this->baseUrl.'getrealtimetraveleals';
            
            $response = HttpRequest::_request($this->url,['key'=>$this->key,'zip'=>$zip,'mileradius'=>$radius,'limit'=>$limit,'page'=>$page,'orderby'=>'radius']);

            if(!$response->hasError){
                $response->data = $this->createDeals($response->data);
            }
            else{
                $response->data=[];
            }

            return $response;
       });
    }
    
    public function getSubcategories(){
        
        return \Cache::remember('subcategories',600,function(){
            
            $this->url = $this->baseUrl.'getsubcategory';
            $categories = [];

            $response = HttpRequest::_request($this->url,['key'=>$this->key]);

            if(!$response->hasError){
                $categories = $this->formatCategories($response->data);
            }

            return $categories;
        });
    }
    
    private function createDeal($data){
        return new EightCouponDeal($data);
    }
    
    private function createDeals(array $objects){
        $deals = array();
       
        foreach($objects as $data){
            array_push($deals,$this->createDeal($data));
        }
        
        return $deals;
    }
    
    private function formatCategories($categories){
        $formatted = [(object)['id'=>0,'name'=>'All']];
        foreach($categories as $category){
            array_push($formatted,(object)['id'=>$category->categoryID,'name'=>$category->category]);
        }
        return $formatted;
    }
    
    private function generateKey(){
        $args = func_get_args();
        $str='';
        foreach($args as $arg){
            $str .= $arg.'_';
        }
        return $str;
    }
    
}
