<?php

namespace App\Models;
use Session;
use DB;

class CheckLogin
{
    public $email='';

    public function __construct(){
        
    }

    public function AuthenLogin($email){
        $count = DB::table('khach_hang')
        ->where('Email', '=', $email)
        ->count();
        $timetmp = Session('LAST_ACTIVITY');
        if($count==1 and $timetmp){
            if(time()-$timetmp<=1800){
                session(['LAST_ACTIVITY' => time()]);
                return true;
            }
        }
        return false;
        
    }
}