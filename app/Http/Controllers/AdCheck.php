<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AdConfig;

class AdCheck extends Controller
{
   

    public function index(){

        $username = 'syful.isl';
        $password = 'Saif5683@2';

        //$data =  $this->adCheck($username, $password);

        $data =  AdConfig::index($username, $password);


        dd($data, $data['UserName']);

    }


    public function smsData(){



    }


   
    





}
