<?php

class Password
{

    public function generate(int $length = 16, $withUppercase = true, $withNumbers = true, $withSymbols = true): string
    {
        $result = '';

        if($length < 8 || $length > 16){
            throw new ErrorException('This generator only accepts passwords between 8 and 16 characters long');
        }

        $lowercase_arr = range('a', 'z');
        $uppercase_arr = range('A', 'Z');
        $numbers_arr = range(0, 9);
        $symbols_arr = ['~','!','@','#'];

        $randomChars = $lowercase_arr;

        if ($withUppercase) {
            $randomChars = array_merge($randomChars, $uppercase_arr);
        }
        if($withNumbers){
            $randomChars = array_merge($randomChars, $numbers_arr);
        }
        if($withSymbols){
            $randomChars = array_merge($randomChars, $symbols_arr);
        }
        
        for ($i = 0; $i < $length; $i++) {
            if($withUppercase && !$this->hasUppercase($result)){
                $result .= $uppercase_arr[rand(0, count($uppercase_arr) - 1)];
            }else if($withNumbers && !$this->hasNumbers($result)){
                $result .= $numbers_arr[rand(0, count($numbers_arr) - 1)];
            }
            else if($withSymbols && !$this->hasSymbols($result)){
                $result .= $symbols_arr[rand(0, count($symbols_arr) - 1)];
            }else{
                $result .= $randomChars[rand(0, count($randomChars) - 1)];
            }
        }

        return str_shuffle($result);
    }

    private function hasUppercase(string $result) : bool{
        return (bool) preg_match('/[A-Z]/', $result);
    }

    private function hasNumbers(string $result) : bool{
        return (bool) preg_match('/[0-9]/', $result);
    } 
    
    private function hasSymbols(string $result) : bool{
        return (bool) preg_match('/[~!@#]/', $result);
    }       

}