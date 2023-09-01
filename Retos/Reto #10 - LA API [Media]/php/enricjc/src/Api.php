<?php

namespace App;

class Api {

    public function call(string $url){

        if($url != 'https://cat-fact.herokuapp.com/facts'){
            throw new \ErrorException('Endpoint URL is not correct');
        }

        try{
            $curl = curl_init();
        
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
            $output = json_decode($response, true);
        }catch(Exception $e){
            throw new \ErrorException($e);
        }

        return $output;
    }

    public function print(array $facts){
        foreach ($facts as $key => $fact) {
            if(isset($fact['text'])){
                echo $fact['text'] . PHP_EOL;
            }
        }
    }

}
