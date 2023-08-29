<?php

/*
 * Escribe un programa que muestre por consola (con un print) los
 * números de 1 a 100 (ambos incluidos y con un salto de línea entre
 * cada impresión), sustituyendo los siguientes:
 * - Múltiplos de 3 por la palabra "fizz".
 * - Múltiplos de 5 por la palabra "buzz".
 * - Múltiplos de 3 y de 5 a la vez por la palabra "fizzbuzz".
 */

final class PrintNumbers
{
    public function print(): void
    {
        for ($n = 1; $n <= 100; $n++) {
            $output = $n;
            if (($n % 3 == 0) && ($n % 5 == 0)) {
                $output = 'fizzbuzz';
            } else if ($n % 3 == 0) {
                $output = 'fizz';
            } else if ($n % 5 == 0) {
                $output = 'buzz';
            }

            print($output . PHP_EOL);
        }
    }
}