<?php

require './src/TennisGame.php';

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(TennisGame::class)]
final class TennisGameTest extends TestCase
{
    private $game;
    protected function setUp(): void
    {
        $this->game = new TennisGame();
    }

    public function testIfTennisGameClassExists(): void
    {
        $this->assertTrue(class_exists('TennisGame'));
    }

    public function testIfMethodResolveExists(): void
    {
        $this->assertTrue(method_exists(TennisGame::class, 'resolve'));
    }

    #[DataProvider('validGameSequence')]
    public function testIfPrintValidGameSequenceResult(array $sequence, string $expected): void
    {
        $winner = $this->game->resolve($sequence);
        $this->expectOutputString($expected);
    }

    public static function validGameSequence()
    {

        yield 'Following exercise example sequence' => [
            ['P1', 'P1', 'P2', 'P2', 'P1', 'P2', 'P1', 'P1'],
            '15 - Love' . PHP_EOL .
            '30 - Love' . PHP_EOL .
            '30 - 15' . PHP_EOL .
            '30 - 30' . PHP_EOL .
            '40 - 30' . PHP_EOL .
            'Deuce' . PHP_EOL .
            'Ventaja P1' . PHP_EOL .
            'Ha ganado el P1' . PHP_EOL
        ];

        yield 'P1 wins in a row' => [
            ['P1', 'P1', 'P1', 'P1'],
            '15 - Love' . PHP_EOL .
            '30 - Love' . PHP_EOL .
            '40 - Love' . PHP_EOL .
            'Ha ganado el P1' . PHP_EOL
        ];

        yield 'P2 wins' => [
            ['P1', 'P1', 'P2', 'P2', 'P2', 'P2'],
            '15 - Love' . PHP_EOL .
            '30 - Love' . PHP_EOL .
            '30 - 15' . PHP_EOL .
            '30 - 30' . PHP_EOL .
            '30 - 40' . PHP_EOL .
            'Ha ganado el P2' . PHP_EOL
        ];            

    }

    #[DataProvider('invalidGameSequence')]
    public function testIfRecognizeInvalidGameSequence(array $sequence, string $expected): void
    {
        $this->expectExceptionMessage($expected);
        $winner = $this->game->resolve($sequence);
    }
    public static function invalidGameSequence()
    {
        yield 'Empty sequence' => [
            [],
            'Sequence cannot be empty'
        ];

        yield 'Less than four games' => [
            ['P1', 'P1', 'P1'],
            'Sequence must contain at least 4 elements'
        ];

        yield 'Not enough games' => [
            ['P1', 'P1', 'P1','P2'],
            'Game cannot end, not enough values'
        ];   

        yield 'Not enough games (II)' => [
            ['P1', 'P1', 'P1','P2', 'P2'],
            'Game cannot end, not enough values'
        ];   

        yield 'Not enough games (III)' => [
            ['P1', 'P1', 'P1','P2', 'P2', 'P2'],
            'Game cannot end because tie game'
        ];          

        yield 'Stuck in Deuce' => [
            ['P1', 'P2', 'P1', 'P2', 'P1', 'P2', 'P1', 'P2'],
            'Game cannot end because tie game'
        ];        

    }

}