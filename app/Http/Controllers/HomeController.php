<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes\EightCoupons;
use App\Classes\Location;
/**
 * Description of HomeController
 *
 * @author FMCJr
 */
class HomeController extends Controller{
    
    use \App\Traits\ResponseTrait;
    
    public function index(Request $request){

        $coupons = new EightCoupons();
        $location = (new Location())->getFromIp();
        
        $zip = $request->get('zip',$location->zip);
        $page = 1;
        $radius = 25;
        $limit= 5;
        $category = 0;
        $dealType = strtolower($request->get('dealType','all'));
        $this->checkOptions($dealType, $zip, $page, $radius, $limit);
    
        
        $travelDeals = $coupons->getRealtimeTravelDeals($zip,$page,$radius,$limit);
        $prodDeals = $coupons->getRealtimeProductDeals($zip,$page,$radius,$limit);
   
        $data =(object)[
            'defaults'=> $coupons->defaults(),
            'travelDeals'=>$travelDeals->data,
            'prodDeals'=>$prodDeals->data,
            'zip'=>$zip,'page'=>$page,'radius'=>$radius,'limit'=>$limit,'category'=>$category,
            'dealType'=>$dealType
        ];
        
        $response = $this->buildResponse([$travelDeals->errorMessage,$prodDeals->errorMessage],'',$travelDeals->hasError || $prodDeals->hasError,$data);
        
        //$response = $coupons->getDealsByLocation($zip, $page,$radius,$limit,$selectedCategories);
            
        return view('index',['response'=>$response]);
        
    }
    
    public function deals(Request $request){
        
        //\Cache::clear();

        $coupons = new EightCoupons();
        $location = (new Location())->getFromIp('98.174.86.36');
        
        $zip = $request->get('zip',$location->zip);
        $page = $request->get('page',1);
        $radius = $request->get('radius',25);
        $limit= $request->get('limit',50);
        $category = $request->get('category',0);
        $dealType = strtolower($request->get('dealType','all'));

        $deals = $this->getDeals($coupons, $dealType, $zip, $page, $radius, $limit, $category);
    
        $data =(object)[
            'defaults'=> $coupons->defaults(),
            'deals'=>$deals->data,
            'zip'=>$zip,'page'=>$page,'radius'=>$radius,'limit'=>$limit,'category'=>$category,
            'dealType'=>$dealType
        ];
        
        $response = $this->buildResponse([$deals->errorMessage],'',$deals->hasError,$data);
            
        return view('deals',['response'=>$response]);
        
    }
    
    private function getDeals($coupons,$dealType,$zip, $page,$radius,$limit,$category){
        switch($dealType){
            case 'all':
            default:
               return $coupons->getDealsByLocation($zip, $page,$radius,$limit,$category);
            case 'product':
                return $coupons->getRealtimeProductDeals($zip,$page,$radius,$limit);
            case 'travel':
                return $coupons->getRealtimeTravelDeals($zip,$page,$radius,$limit);
        }
    }
    
    private function checkOptions(&$dealType,&$zip, &$page,&$radius,&$limit){
        
        if($dealType != 'all' || $dealType != 'product' || $dealType !='travel'){
            $dealType = 'all';
        }
        
        if(! preg_match('/^([0-9]+)$/',$page)){
            $page = 1;
        }
        
       
        if(!in_array($radius,collect(getRadius())->keys()->all())){
            $radius = getRadius()[0]->id;
        }
        
        if(!in_array($limit,collect(getLimits())->keys()->all())){
            $limit = getLimits()[0]->id;
        }
        
        if(! preg_match('/^([0-9]+)$/',$zip) && strlen($zip) >5){
            $zip = '02901';
        }

        
    }
    
    
}
