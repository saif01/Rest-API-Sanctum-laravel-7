<?php

namespace App\Http\Controllers;


class AdConfig
{

    public static function index($userId, $password){
        
        // if( isset( $_POST['UserID']) && isset($_POST['Password']) )
        // {

            // $userId = $_POST['UserID'];
            // $password = $_POST['Password'];
                
            $ldapHost = "10.64.1.3";
            // $ldapHost = "10.242.97.10";
            $ldapUser = $userId."@cpbd.co.bd";
            $ldapConn = @ldap_connect($ldapHost);
            ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

            if ($ldapConn) 
            {
                $ldapBind = @ldap_bind($ldapConn, $ldapUser, $password);

                if ($ldapBind) 
                {
                    $dn = "DC=CPBD,DC=CO,DC=BD";
                    $filter = "(&(samaccountname=" . $userId . "))";
                    $search = @ldap_search($ldapConn, $dn, $filter);
                    $info = @ldap_get_entries($ldapConn, $search);
                    $count = @ldap_count_entries($ldapConn, $search);
            
                    if ($count == 1) {
                        //echo json_encode([

                        return [

                                'Status'=>'OK',
                                'UserID'=>(is_null(@$info[0]["samaccountname"][0])) ? "" : $info[0]["samaccountname"][0],
                                'UserName'=>(is_null(@$info[0]["name"][0])) ? "" : $info[0]["name"][0],
                                'OfficeMobile'=>(is_null(@$info[0]["telephonenumber"][0])) ? "" : $info[0]["telephonenumber"][0],
                                'OfficeEmail'=>(is_null(@$info[0]["mail"][0])) ? "" : $info[0]["mail"][0],
                                'PersonalMobile'=>(is_null(@$info[0]["mobile"][0])) ? "" : $info[0]["mobile"][0],
                                'PersonalEmail'=>(is_null(@$info[0]["facsimiletelephonenumber"][0])) ? "" : $info[0]["facsimiletelephonenumber"][0],
                                'OfficeID'=>(is_null(@$info[0]["wwwhomepage"][0])) ? "" : $info[0]["wwwhomepage"][0],
                                'NationalID'=>(is_null(@$info[0]["ipphone"][0])) ? "" : $info[0]["ipphone"][0],
                                'Position'=>(is_null(@$info[0]["title"][0])) ? "" : $info[0]["title"][0],
                                'Designation'=>(is_null(@$info[0]["department"][0])) ? "" : $info[0]["department"][0],
                                //   'Office'=>(is_null(@$info[0]["distinguishedname"][0])) ? "" : substr(substr($info[0]["distinguishedname"][0], strpos($info[0]["distinguishedname"][0], ',OU=') + 4, 100), 0, strpos(substr($info[0]["distinguishedname"][0], strpos($info[0]["distinguishedname"][0], ',OU=') + 4, 100), ',OU=')),
                                'Office'=>(is_null(@$info[0]["physicaldeliveryofficename"][0])) ? "" : $info[0]["physicaldeliveryofficename"][0],
                                //   'BusinessUnit'=>(is_null(@$info[0]["distinguishedname"][0])) ? "" : substr(substr($info[0]["distinguishedname"][0], 0, strrpos($info[0]["distinguishedname"][0], ',OU=')), strrpos(substr($info[0]["distinguishedname"][0], 0, strrpos($info[0]["distinguishedname"][0], ',OU=')), ',OU=') + 4, 100),
                                'BusinessUnit'=>(is_null(@$info[0]["description"][0])) ? "" : $info[0]["description"][0],
                                //   'Company'=>(is_null(@$info[0]["distinguishedname"][0])) ? "" : substr(substr($info[0]["distinguishedname"][0], 0, strpos($info[0]["distinguishedname"][0], ',DC=')), strrpos(substr($info[0]["distinguishedname"][0], 0, strpos($info[0]["distinguishedname"][0], ',DC=')), ',OU=') + 4, 100),
                                'Company'=>('C.P.Bangladesh'),
                                'Nationality'=>(is_null(@$info[0]["c"][0])) ? "" : $info[0]["c"][0],
                                'ADPolicy1'=>(is_null(@$info[0]["memberof"][0])) ? "" : substr($info[0]["memberof"][0], strpos($info[0]["memberof"][0], 'CN=') + 3, strpos($info[0]["memberof"][0], ',OU=') - strpos($info[0]["memberof"][0], 'CN=') - 3),
                                'ADPolicy2'=>(is_null(@$info[0]["memberof"][1])) ? "" : substr($info[0]["memberof"][1], strpos($info[0]["memberof"][1], 'CN=') + 3, strpos($info[0]["memberof"][1], ',OU=') - strpos($info[0]["memberof"][1], 'CN=') - 3),
                                'ADPolicy3'=>(is_null(@$info[0]["memberof"][2])) ? "" : substr($info[0]["memberof"][2], strpos($info[0]["memberof"][2], 'CN=') + 3, strpos($info[0]["memberof"][2], ',OU=') - strpos($info[0]["memberof"][2], 'CN=') - 3),
                                'ADPolicy4'=>(is_null(@$info[0]["memberof"][3])) ? "" : substr($info[0]["memberof"][3], strpos($info[0]["memberof"][3], 'CN=') + 3, strpos($info[0]["memberof"][3], ',OU=') - strpos($info[0]["memberof"][3], 'CN=') - 3),
                                'ADPolicy5'=>(is_null(@$info[0]["memberof"][4])) ? "" : substr($info[0]["memberof"][4], strpos($info[0]["memberof"][4], 'CN=') + 3, strpos($info[0]["memberof"][4], ',OU=') - strpos($info[0]["memberof"][4], 'CN=') - 3),
                                'ADPolicy6'=>(is_null(@$info[0]["memberof"][5])) ? "" : substr($info[0]["memberof"][5], strpos($info[0]["memberof"][5], 'CN=') + 3, strpos($info[0]["memberof"][5], ',OU=') - strpos($info[0]["memberof"][5], 'CN=') - 3),
                                'ADPolicy7'=>(is_null(@$info[0]["memberof"][6])) ? "" : substr($info[0]["memberof"][6], strpos($info[0]["memberof"][6], 'CN=') + 3, strpos($info[0]["memberof"][6], ',OU=') - strpos($info[0]["memberof"][6], 'CN=') - 3),
                                'ADPolicy8'=>(is_null(@$info[0]["memberof"][7])) ? "" : substr($info[0]["memberof"][7], strpos($info[0]["memberof"][7], 'CN=') + 3, strpos($info[0]["memberof"][7], ',OU=') - strpos($info[0]["memberof"][7], 'CN=') - 3),
                                'ADPolicy9'=>(is_null(@$info[0]["memberof"][8])) ? "" : substr($info[0]["memberof"][8], strpos($info[0]["memberof"][8], 'CN=') + 3, strpos($info[0]["memberof"][8], ',OU=') - strpos($info[0]["memberof"][8], 'CN=') - 3),
                                'ADPolicy10'=>(is_null(@$info[0]["memberof"][9])) ? "" : substr($info[0]["memberof"][9], strpos($info[0]["memberof"][9], 'CN=') + 3, strpos($info[0]["memberof"][9], ',OU=') - strpos($info[0]["memberof"][9], 'CN=') - 3),
                                'ADPolicy11'=>(is_null(@$info[0]["memberof"][10])) ? "" : substr($info[0]["memberof"][10], strpos($info[0]["memberof"][10], 'CN=') + 3, strpos($info[0]["memberof"][10], ',OU=') - strpos($info[0]["memberof"][10], 'CN=') - 3),
                                'ADPolicy12'=>(is_null(@$info[0]["memberof"][11])) ? "" : substr($info[0]["memberof"][11], strpos($info[0]["memberof"][11], 'CN=') + 3, strpos($info[0]["memberof"][11], ',OU=') - strpos($info[0]["memberof"][11], 'CN=') - 3),
                                'ADPolicy13'=>(is_null(@$info[0]["memberof"][12])) ? "" : substr($info[0]["memberof"][12], strpos($info[0]["memberof"][12], 'CN=') + 3, strpos($info[0]["memberof"][12], ',OU=') - strpos($info[0]["memberof"][12], 'CN=') - 3),
                                'ADPolicy14'=>(is_null(@$info[0]["memberof"][13])) ? "" : substr($info[0]["memberof"][13], strpos($info[0]["memberof"][13], 'CN=') + 3, strpos($info[0]["memberof"][13], ',OU=') - strpos($info[0]["memberof"][13], 'CN=') - 3),
                                'ADPolicy15'=>(is_null(@$info[0]["memberof"][14])) ? "" : substr($info[0]["memberof"][14], strpos($info[0]["memberof"][14], 'CN=') + 3, strpos($info[0]["memberof"][14], ',OU=') - strpos($info[0]["memberof"][14], 'CN=') - 3),
                                'ADPolicy16'=>(is_null(@$info[0]["memberof"][15])) ? "" : substr($info[0]["memberof"][15], strpos($info[0]["memberof"][15], 'CN=') + 3, strpos($info[0]["memberof"][15], ',OU=') - strpos($info[0]["memberof"][15], 'CN=') - 3),
                                'ADPolicy17'=>(is_null(@$info[0]["memberof"][16])) ? "" : substr($info[0]["memberof"][16], strpos($info[0]["memberof"][16], 'CN=') + 3, strpos($info[0]["memberof"][16], ',OU=') - strpos($info[0]["memberof"][16], 'CN=') - 3),
                                'ADPolicy18'=>(is_null(@$info[0]["memberof"][17])) ? "" : substr($info[0]["memberof"][17], strpos($info[0]["memberof"][17], 'CN=') + 3, strpos($info[0]["memberof"][17], ',OU=') - strpos($info[0]["memberof"][17], 'CN=') - 3),
                                'ADPolicy19'=>(is_null(@$info[0]["memberof"][18])) ? "" : substr($info[0]["memberof"][18], strpos($info[0]["memberof"][18], 'CN=') + 3, strpos($info[0]["memberof"][18], ',OU=') - strpos($info[0]["memberof"][18], 'CN=') - 3),
                                'ADPolicy20'=>(is_null(@$info[0]["memberof"][19])) ? "" : substr($info[0]["memberof"][19], strpos($info[0]["memberof"][19], 'CN=') + 3, strpos($info[0]["memberof"][19], ',OU=') - strpos($info[0]["memberof"][19], 'CN=') - 3),
                                'Manager'=>(is_null(@$info[0]["manager"][0])) ? "" : substr($info[0]["manager"][0], strpos($info[0]["manager"][0], 'CN=') + 3, strpos($info[0]["manager"][0], ',OU=') - strpos($info[0]["manager"][0], 'CN=') - 3)

                        ];

                       // ]);								  
                    }
                } 
                else 
                { 
                  return ['Status'=>'ERROR'];
                } 
            } 
            else 
            { 
                return "Can not connect server....!";
            }
            // ldap_unbind($ldapConn);
            ldap_close($ldapConn);

        //}

    }

}