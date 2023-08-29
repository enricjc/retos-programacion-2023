<?php

require './src/HackerLanguage.php';

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HackerLanguage::class)]
final class HackerLanguageTest extends TestCase
{
    private $hacker;
    protected function setUp(): void
    {
        $this->hacker = new HackerLanguage();
    }

    public function testIfHackerLanguageClassExists(): void
    {
        $this->assertTrue(class_exists('HackerLanguage'));
    }

    public function testIfTransformMethodExists(): void
    {
        $this->assertTrue(method_exists($this->hacker, 'transform'));
    }

    /**
     * @deprecated
     */
    /*
    public function testIfTransformMethodReceivesArgument(): void
    {
        $this->hacker->transform('A');

        $this->expectOutputString('A');
    }
    */

    public function testIfTransformMethodReturnsString(): void
    {
        $result = $this->hacker->transform('E');

        $this->assertIsString($result);
    }

    public function testIfTransformMethodReturnsFourInsteadOfA(): void
    {
        $result = $this->hacker->transform('A');

        $this->assertTrue($result === '4');
    }

    public function testIfTransformMethodReturnsFirstFiveLettersInLeet(): void
    {
        $result = $this->hacker->transform('ABCDE');

        $this->assertTrue($result === '48(|)3');
    }

    public function testIfTransformMethodReturnsStringInLeet(): void
    {
        $result = $this->hacker->transform('Hello World');

        $this->assertTrue($result === '43110 \/\/021|)');
    }
}