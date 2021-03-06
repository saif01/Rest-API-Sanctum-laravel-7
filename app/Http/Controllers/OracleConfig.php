<?php

namespace App\Http\Controllers;


class OracleConfig
{

    public $oracleConnect;

    public function __construct(){

        $this->oracleConnect = oci_connect( config('values.oci_user'), config('values.oci_pass'), config('values.oci_db') );

        //$this->oracleConnect = oci_connect("cpbit", "cpbit#2020", "CPBDPRD");

        //$this->oracleConnect = "This is test";
    }

    public function con(){

       //oci_connect("cpbit", "cpbit#2020", "CPBDPRD");

        $coneee = oci_connect("cpbit", "cpbit#2020", "CPBDPRD");

        if(!$coneee){

            die("Failed to connect to Database"); 
        }

        return $coneee;


    }

    // $oracleConnect = oci_connect("cpbit", "cpbit#2020", "CPBDPRD");

}