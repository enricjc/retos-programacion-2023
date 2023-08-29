<?php

require './src/PrintNumbers.php';

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;


#[CoversClass(PrintNumbers::class)]
final class PrintNumbersTest extends TestCase
{
    public function testIfClassPrintNumberExists(): void
    {
        $this->assertTrue(class_exists('PrintNumbers'));
    }

    public function testIfMethodPrintExists(): void
    {
        $printer = new PrintNumbers();

        $this->assertTrue(method_exists($printer, 'print'));
    }

    /**
     * @deprecated
     */
    /*
    public function testPrintNumbersFromOneToThree(): void
    {
        $printer = new PrintNumbers();

        $this->expectOutputString('1' . PHP_EOL . '2' . PHP_EOL . '3' . PHP_EOL . '');

        $printer->print();
    }       
    */

    /**
     * @deprecated
     */
    /*
    public function testPrintNumbersFromOneToOneHundred(): void
    {
        $printer = new PrintNumbers();

        $this->expectOutputString('1' . PHP_EOL . '2' . PHP_EOL . '3' . PHP_EOL . '4' . PHP_EOL . '5' . PHP_EOL . '6' . PHP_EOL . '7' . PHP_EOL . '8' . PHP_EOL . '9' . PHP_EOL . '10' . PHP_EOL . '11' . PHP_EOL . '12' . PHP_EOL . '13' . PHP_EOL . '14' . PHP_EOL . '15' . PHP_EOL . '16' . PHP_EOL . '17' . PHP_EOL . '18' . PHP_EOL . '19' . PHP_EOL . '20' . PHP_EOL . '21' . PHP_EOL . '22' . PHP_EOL . '23' . PHP_EOL . '24' . PHP_EOL . '25' . PHP_EOL . '26' . PHP_EOL . '27' . PHP_EOL . '28' . PHP_EOL . '29' . PHP_EOL . '30' . PHP_EOL . '31' . PHP_EOL . '32' . PHP_EOL . '33' . PHP_EOL . '34' . PHP_EOL . '35' . PHP_EOL . '36' . PHP_EOL . '37' . PHP_EOL . '38' . PHP_EOL . '39' . PHP_EOL . '40' . PHP_EOL . '41' . PHP_EOL . '42' . PHP_EOL . '43' . PHP_EOL . '44' . PHP_EOL . '45' . PHP_EOL . '46' . PHP_EOL . '47' . PHP_EOL . '48' . PHP_EOL . '49' . PHP_EOL . '50' . PHP_EOL . '51' . PHP_EOL . '52' . PHP_EOL . '53' . PHP_EOL . '54' . PHP_EOL . '55' . PHP_EOL . '56' . PHP_EOL . '57' . PHP_EOL . '58' . PHP_EOL . '59' . PHP_EOL . '60' . PHP_EOL . '61' . PHP_EOL . '62' . PHP_EOL . '63' . PHP_EOL . '64' . PHP_EOL . '65' . PHP_EOL . '66' . PHP_EOL . '67' . PHP_EOL . '68' . PHP_EOL . '69' . PHP_EOL . '70' . PHP_EOL . '71' . PHP_EOL . '72' . PHP_EOL . '73' . PHP_EOL . '74' . PHP_EOL . '75' . PHP_EOL . '76' . PHP_EOL . '77' . PHP_EOL . '78' . PHP_EOL . '79' . PHP_EOL . '80' . PHP_EOL . '81' . PHP_EOL . '82' . PHP_EOL . '83' . PHP_EOL . '84' . PHP_EOL . '85' . PHP_EOL . '86' . PHP_EOL . '87' . PHP_EOL . '88' . PHP_EOL . '89' . PHP_EOL . '90' . PHP_EOL . '91' . PHP_EOL . '92' . PHP_EOL . '93' . PHP_EOL . '94' . PHP_EOL . '95' . PHP_EOL . '96' . PHP_EOL . '97' . PHP_EOL . '98' . PHP_EOL . '99' . PHP_EOL . '100' . PHP_EOL);

        $printer->print();
    }
    */

    /**
     * @deprecated
     */
    /*
    public function testIfPrintFizzWithMultiplesOfThree() : void
    {
                    $this->markTestSkipped(
              'The MySQLi extension is not available.'
            );
        $printer = new PrintNumbers();

        $this->expectOutputString(
            '1' . PHP_EOL . '2' . PHP_EOL . 'fizz' . PHP_EOL . '4' . PHP_EOL . '5' . PHP_EOL . 'fizz' . PHP_EOL . '7' . PHP_EOL . '8' . PHP_EOL . 'fizz' . PHP_EOL . '10' . PHP_EOL . '11' . PHP_EOL . 'fizz' . PHP_EOL . '13' . PHP_EOL . '14' . PHP_EOL . 'fizz' . PHP_EOL . '16' . PHP_EOL . '17' . PHP_EOL . 'fizz' . PHP_EOL . '19' . PHP_EOL . '20' . PHP_EOL . 'fizz' . PHP_EOL . '22' . PHP_EOL . '23' . PHP_EOL . 'fizz' . PHP_EOL . '25' . PHP_EOL . '26' . PHP_EOL . 'fizz' . PHP_EOL . '28' . PHP_EOL . '29' . PHP_EOL . 'fizz' . PHP_EOL . '31' . PHP_EOL . '32' . PHP_EOL . 'fizz' . PHP_EOL . '34' . PHP_EOL . '35' . PHP_EOL . 'fizz' . PHP_EOL . '37' . PHP_EOL . '38' . PHP_EOL . 'fizz' . PHP_EOL . '40' . PHP_EOL . '41' . PHP_EOL . 'fizz' . PHP_EOL . '43' . PHP_EOL . '44' . PHP_EOL . 'fizz' . PHP_EOL . '46' . PHP_EOL . '47' . PHP_EOL . 'fizz' . PHP_EOL . '49' . PHP_EOL . '50' . PHP_EOL . 'fizz' . PHP_EOL . '52' . PHP_EOL . '53' . PHP_EOL . 'fizz' . PHP_EOL . '55' . PHP_EOL . '56' . PHP_EOL . 'fizz' . PHP_EOL . '58' . PHP_EOL . '59' . PHP_EOL . 'fizz' . PHP_EOL . '61' . PHP_EOL . '62' . PHP_EOL . 'fizz' . PHP_EOL . '64' . PHP_EOL . '65' . PHP_EOL . 'fizz' . PHP_EOL . '67' . PHP_EOL . '68' . PHP_EOL . 'fizz' . PHP_EOL . '70' . PHP_EOL . '71' . PHP_EOL . 'fizz' . PHP_EOL . '73' . PHP_EOL . '74' . PHP_EOL . 'fizz' . PHP_EOL . '76' . PHP_EOL . '77' . PHP_EOL . 'fizz' . PHP_EOL . '79' . PHP_EOL . '80' . PHP_EOL . 'fizz' . PHP_EOL . '82' . PHP_EOL . '83' . PHP_EOL . 'fizz' . PHP_EOL . '85' . PHP_EOL . '86' . PHP_EOL . 'fizz' . PHP_EOL . '88' . PHP_EOL . '89' . PHP_EOL . 'fizz' . PHP_EOL . '91' . PHP_EOL . '92' . PHP_EOL . 'fizz' . PHP_EOL . '94' . PHP_EOL . '95' . PHP_EOL . 'fizz' . PHP_EOL . '97' . PHP_EOL . '98' . PHP_EOL . 'fizz' . PHP_EOL . '100' . PHP_EOL);

        $printer->print();

    }
    */
    public function testIfPrintNumbersAndFizzBuzz(): void
    {
        $printer = new PrintNumbers();

        $this->expectOutputString(
            '1' . PHP_EOL . '2' . PHP_EOL . 'fizz' . PHP_EOL . '4' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '7' . PHP_EOL . '8' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '11' . PHP_EOL . 'fizz' . PHP_EOL . '13' . PHP_EOL . '14' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '16' . PHP_EOL . '17' . PHP_EOL . 'fizz' . PHP_EOL . '19' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '22' . PHP_EOL . '23' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '26' . PHP_EOL . 'fizz' . PHP_EOL . '28' . PHP_EOL . '29' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '31' . PHP_EOL . '32' . PHP_EOL . 'fizz' . PHP_EOL . '34' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '37' . PHP_EOL . '38' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '41' . PHP_EOL . 'fizz' . PHP_EOL . '43' . PHP_EOL . '44' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '46' . PHP_EOL . '47' . PHP_EOL . 'fizz' . PHP_EOL . '49' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '52' . PHP_EOL . '53' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '56' . PHP_EOL . 'fizz' . PHP_EOL . '58' . PHP_EOL . '59' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '61' . PHP_EOL . '62' . PHP_EOL . 'fizz' . PHP_EOL . '64' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '67' . PHP_EOL . '68' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '71' . PHP_EOL . 'fizz' . PHP_EOL . '73' . PHP_EOL . '74' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '76' . PHP_EOL . '77' . PHP_EOL . 'fizz' . PHP_EOL . '79' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '82' . PHP_EOL . '83' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL . '86' . PHP_EOL . 'fizz' . PHP_EOL . '88' . PHP_EOL . '89' . PHP_EOL . 'fizzbuzz' . PHP_EOL . '91' . PHP_EOL . '92' . PHP_EOL . 'fizz' . PHP_EOL . '94' . PHP_EOL . 'buzz' . PHP_EOL . 'fizz' . PHP_EOL . '97' . PHP_EOL . '98' . PHP_EOL . 'fizz' . PHP_EOL . 'buzz' . PHP_EOL
        );

        $printer->print();

    }
}