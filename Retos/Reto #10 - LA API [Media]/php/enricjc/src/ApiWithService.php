<?php

namespace App;

use App\CatService;


class ApiWithService
{

    private CatService $apiSrv;

    public function __construct(CatService $apiSrv)
    {
        $this->apiSrv = $apiSrv;
    }

    public function call()
    {
        return $this->apiSrv->call();
    }

    public function print(array $facts)
    {
        foreach ($facts as $key => $fact) {
            if (isset($fact['text'])) {
                echo $fact['text'] . PHP_EOL;
            }
        }
    }

}