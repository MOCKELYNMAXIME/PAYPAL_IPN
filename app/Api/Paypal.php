<?php
/**
 * Created by PhpStorm.
 * User: sysdev
 * Date: 20/07/16
 * Time: 14:53
 */

namespace App\Paypal;


class Paypal
{
    private $user       = "mmockelyn-facilitator_api1.gmail.com";
    private $pwd        = "35PH4JEHJ5UUM8WR";
    private $signature  = "AiDxRCYK2QPYGe9tz7Hyx7Gw7dBaAw-B0QVQZPS8X50cWuAvSJuXAoXJ";
    private $endpoint   = "https://api-3t.sandbox.paypal.com/nvp";
    public $error       = array();

    public function __construct($user = false, $pwd = false, $signature = false, $prod = false)
    {
        if($user){
            $this->user = $user;
        }
        if($pwd){
            $this->pwd = $pwd;
        }
        if($signature){
            $this->signature = $signature;
        }
        if($prod){
            $this->endpoint = str_replace('sandbox.', '', $this->endpoint);
        }
    }

    public function request($method, $params){
        $params = array_merge($params, array(
            "METHOD"    => $method,
            "VERSION"   => '204.0',
            "USER"      => $this->user,
            "SIGNATURE" => $this->signature,
            "PWD"       => $this->pwd
        ));
        $params = http_build_query($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL             => $this->endpoint,
            CURLOPT_POST            => 1,
            CURLOPT_POSTFIELDS      => $params,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_VERBOSE         => 1
        ));
        $reponse = curl_exec($curl);
        $reponseArray = array();
        parse_str($reponse, $reponseArray);
        if(curl_errno($curl)){
            $this->error = curl_error($curl);
            curl_close($curl);
            return false;
        }else{
            if($reponseArray['ACK'] == 'Success'){
                curl_close($curl);
                return $reponseArray;
            }else{
                $this->error = $reponseArray;
                curl_close($curl);
                return false;
            }
        }
    }
}