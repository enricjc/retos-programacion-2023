<?php

require './src/Password.php';

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Password::class)]
final class PasswordTest extends TestCase
{
    private $passwordGen;
    protected function setUp(): void
    {
        $this->passwordGen = new Password();
    }

    public function testIfPasswordClassExists(): void
    {
        $this->assertTrue(class_exists('Password'));
    }

    public function testIfGenerateMethodExists(): void
    {
        $this->assertTrue(method_exists(Password::class, 'generate'));
    }

    public function testIfGenerateMethodReturnsString(): void
    {
        $this->assertIsString($this->passwordGen->generate());
    }

    public function testIfReturnsEightStringPassword(): void
    {
        $result = $this->passwordGen->generate(8);
        $length = strlen($result);
        $this->assertEquals(8, $length);
    }

    public function testIfReturnsSixteenStringPassword(): void
    {
        $result = $this->passwordGen->generate(16);
        $length = strlen($result);
        $this->assertEquals(16, $length);
    } 
    
    public function testIfReturnsExceptionIfPasswordIsLessThanEightCharacters(): void
    {
        $this->expectExceptionMessage('This generator only accepts passwords between 8 and 16 characters long');
        $result = $this->passwordGen->generate(7);
    }

    public function testIfReturnsExceptionIfPasswordIsMoreThanSixteenCharacters(): void
    {
        $this->expectExceptionMessage('This generator only accepts passwords between 8 and 16 characters long');
        $result = $this->passwordGen->generate(20);
    }    
    
    public function testIfReturnsOnlyLowercasePassword(): void
    {
        $result = $this->passwordGen->generate(8, false);
        $containsUppercaseCharacter = (bool) preg_match('/[A-Z]/', $result);
        $this->assertFalse($containsUppercaseCharacter);
    }    
    public function testIfReturnsLowercaseAndUpperCasePassword(): void
    {
        $result = $this->passwordGen->generate(16, true, false);
        $containsUppercaseCharacter = (bool) preg_match('/[A-Z]/', $result);
        $this->assertTrue($containsUppercaseCharacter);
    }

    public function testIfReturnsPasswordWithNumbers() : void{

        $result = $this->passwordGen->generate(16, true, true);
        $containsNumber = (bool) preg_match('/[0-9]/', $result);
        $this->assertTrue($containsNumber);
    }

    public function testIfReturnsPasswordWithoutNumbers() : void{

        $result = $this->passwordGen->generate(16, true, false);
        $containsNumber = (bool) preg_match('/[0-9]/', $result);
        $this->assertFalse($containsNumber);
    }
    public function testIfReturnsPasswordWithSymbols() : void{

        $result = $this->passwordGen->generate(16, true, true, true);
        $containsSymbols = (bool) preg_match('/[~!@#]/', $result);
        $this->assertTrue($containsSymbols);
    }        

}