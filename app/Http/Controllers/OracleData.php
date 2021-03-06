<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;


class OracleData extends Controller
{

  
    public function smsData(){

        // $pdo = DB::connection()->getPdo();

        // if($pdo)
        //     {

        //      echo "Connected successfully to database ".DB::connection()->getDatabaseName();

        //     } else {

        //      echo "You are not connected to database";

        //     }

            //From oracle

            $orderDate = '02/03/2021';
            $operationCode = '11';
            

            $oracleData = DB::connection('oracle_db')->table('IT_SMS_SALES_ORDER')->where('OPERATION_CODE', $operationCode)
                ->where('INVOICE_DATE',  DB::raw( "TO_DATE('$orderDate','DD/MM/YYYY')" ) ) 
                ->get();


                //From myql

            $dataMysql = User::all();




            dd($oracleData, $dataMysql);

           
    }
}
