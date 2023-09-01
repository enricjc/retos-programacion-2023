<?php

namespace App;

class CatService
{

    private string $url = 'https://cat-fact.herokuapp.com/facts';

    public function call()
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $this->url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
            $output = json_decode($response, true);
        } catch (Exception $e) {
            throw new \ErrorException($e);
        }

        return $output;
    }

}