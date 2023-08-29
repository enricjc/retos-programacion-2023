<?php

/*
 * Escribe un programa que reciba un texto y transforme lenguaje natural a
 * "lenguaje hacker" (conocido realmente como "leet" o "1337"). Este lenguaje
 *  se caracteriza por sustituir caracteres alfanuméricos.
 * - Utiliza esta tabla (https://www.gamehouse.com/blog/leet-speak-cheat-sheet/) 
 *   con el alfabeto y los números en "leet".
 *   (Usa la primera opción de cada transformación. Por ejemplo "4" para la "a")
 */

class HackerLanguage
{
    private const ALPHABET = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    // https://gist.github.com/hinzundcode/1073530
    private const LEET = array(
        'A' => array('4', '@', '/\\', '/-\\', '?', '^', 'α', 'λ'),
        'B' => array('8', '|3', 'ß', 'l³', '|>', '13', 'I3'),
        'C' => array('(', '[', '<', '©', '¢'),
        'D' => array('|)', '|]', 'Ð', 'đ', '1)'),
        'E' => array('3', '€', '&', '£', 'ε'),
        'F' => array('|=', 'PH', '|*|-|', '|"', 'ƒ', 'l²'),
        'G' => array('6', '&, 9'),
        'H' => array('4', '|-|', '#', '}{', ']-[', '/-/', ')-('),
        'I' => array('!', '1', '|', ']['),
        'J' => array('_|', '¿'),
        'K' => array('|<', '|{', '|(', 'X'),
        'L' => array('1', '|_', '£', '|', '][_'),
        'M' => array('/\\/\\', '/v\\', '|V|', ']V[', '|\\/|', 'AA', '[]V[]', '|11', '/|\\', '^^', '(V),|Y|'),
        'N' => array('|\\|', '/\\/', '/V', '|V', '/\\/', '|1', '2', '?', '(\\), 11'),
        'O' => array('0', '9', '()', '[]', '*', '°', '<>', 'ø', '{[]}'),
        'P' => array('|°', 'p', '|>', '|*', '[]D', '][D', '|²', '|?', '|D'),
        'Q' => array('0_', '0,'),
        'R' => array('2', '|2', '1², ®', '?', 'я, 12, .-'),
        'S' => array('5', '$', '§', '?', 'ŝ', 'ş'),
        'T' => array('7', '+', '†', '\'][\'', '|'),
        'U' => array('|_|', 'µ', '[_]', 'v'),
        'V' => array('\\/', '|/', '\\|', '\\\''),
        'W' => array('\\/\\/', 'VV', '\\A/', '\\\'', 'uu', '\\^/', '\\|/'),
        'X' => array('><', ')(', '}{', '%', '?', '×', ']['),
        'Y' => array('`/', '°/', '9', '¥'),
        'Z' => array('z', '2', '"/_'),
        'Ä' => array('43', '°A°', '°4°'),
        'Ö' => array('03', '°O°'),
        'Ü' => array('|_|3', '°U°')
    );

    public function transform(string $text): string
    {
        $result = '';
        for ($c = 0; $c < strlen($text); $c++) {
            $char = strtoupper($text[$c]);
            $result .= $char != ' ' ? self::LEET[$char][0] : $char;
        }

        return empty($result) ? $text : $result;
    }

    /*
    public function run(string $text): void
    {
        $result = $this->transform($text);
        echo $result . PHP_EOL;
    }
    */
}

/*
$hacker = new HackerLanguage();
$hacker->run('Hello World 1234');
*/