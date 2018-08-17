<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function currencyFormat($number){
    return number_format($number,2);
}

function dateDiff($dateStr, $dateStr2=null,$diffType=1){

    $date1 = Carbon\Carbon::instance(new DateTime($dateStr));
    $date2 = $dateStr2 == nullOrEmptyString()? Carbon\Carbon::instance(new DateTime()) : Carbon\Carbon::instance(new DateTime($dateStr2));

    switch($diffType){
        case 1:
        default:
            return $date2->diffInMinutes($date1);
        case 2:
            return $date2->diffInHours($date1);
        case 3:
            return $date2->diffInDays($date1);
    }
}

function formatDate($type=1,$datestring=null){
        if($datestring instanceof DateTime){
            $date = $datestring;
        }
        else{
            $date = ($datestring == null)? new DateTime() : new DateTime($datestring);
        }

        $date = Carbon\Carbon::instance($date);

    switch($type){
        case 0:
            return $date->format('Y-m-d H:i:s');
        case 1:
        default:
            return $date->diffForHumans();
        case 2:
            return $date->format('m/d/Y');
        case 3:
            return $date->format('m/d/Y @g:i:s A');
        case 4:
            return $date->format('m/d/Y @g:i A');
        case 5:
            return $date->format('m/d/Y @H:i:s');
        case 6:
            return $date->format('M Y');
        case 7:
            return $date->format('M j');
        case 8:
            return $date->format('\@g:i:s A');
        case 9:
            return $date->format('m/d');
        case 10:
            return $date->format('F j, Y');
        case 11:
            return $date->format('m/d @H:i');
        case 12:
            return $date->format('g:i A');
    }

}

function getLimits(){
    return [
        (object)(['id'=>5, 'name'=>5]),
        (object)['id'=>25, 'name'=>25],
        (object)['id'=>50, 'name'=>50],
        (object)['id'=>100, 'name'=>100]
    ];
}

function getRadius(){
    return [
        (object)['id'=>1, 'name'=>'1 mile'],
        (object)['id'=>2, 'name'=>'2 miles'],
        (object)['id'=>5, 'name'=>'5 miles'],
        (object)['id'=>10, 'name'=>'10 miles'],
        (object)['id'=>25, 'name'=>'25 miles'],
        (object)['id'=>50, 'name'=>'50 miles']
    ];
}

function partialStr($str,$length=100,$suffix='...'){
    if($length > strlen($str)){
        $length = strlen($str);
    }
    return substr($str,0,$length).$suffix;
}



