<?php

/*
 * Escribe un programa que muestre cómo transcurre un juego de tenis y quién lo ha ganado.
 * El programa recibirá una secuencia formada por "P1" (Player 1) o "P2" (Player 2), según quien
 * gane cada punto del juego.
 * 
 * - Las puntuaciones de un juego son "Love" (cero), 15, 30, 40, "Deuce" (empate), ventaja.
 * - Ante la secuencia [P1, P1, P2, P2, P1, P2, P1, P1], el programa mostraría lo siguiente:
 *   15 - Love
 *   30 - Love
 *   30 - 15
 *   30 - 30
 *   40 - 30
 *   Deuce
 *   Ventaja P1
 *   Ha ganado el P1
 * - Si quieres, puedes controlar errores en la entrada de datos.   
 * - Consulta las reglas del juego si tienes dudas sobre el sistema de puntos.   
 */

class TennisGame
{

    private const POINTS = ['Love', '15', '30', '40', 'Deuce', 'Ventaja', 'Ha ganado el'];
    private const P1 = 'P1';
    private const P2 = 'P2';

    public function resolve(array $sequence): void
    {
        if ($sequnece || empty($sequence)) {
            throw new InvalidArgumentException('Sequence cannot be empty');
        }

        if (count($sequence) < 4) {
            throw new InvalidArgumentException('Sequence must contain at least 4 elements');
        }

        $seq_length = count($sequence);
        $array_count_values = array_count_values($sequence);

        if ($array_count_values[self::P1] == $array_count_values[self::P2]) {
            throw new InvalidArgumentException('Game cannot end because tie game');
        }else if( $seq_length <= 5 && ($array_count_values[self::P1] < 4 && $array_count_values[self::P2] < 4 ))
        {
            throw new InvalidArgumentException('Game cannot end, not enough values');
        }    
        

        $counter = array(
            'P1' => 0,
            'P2' => 0
        );

        foreach ($sequence as $key => $winner) {
            $counter[$winner]++;
            $loser = ($winner == self::P1 ? self::P2 : self::P1);

            if ($counter[$winner] >= 3 && $counter[$winner] == $counter[$loser]) {
                echo 'Deuce' . PHP_EOL;
            } else if ($counter[$winner] >= 4 && abs($counter[$winner] - $counter[$loser]) == 1) {
                echo 'Ventaja ' . $winner . PHP_EOL;
            } else if ($counter[$winner] >= 4 && abs($counter[$winner] - $counter[$loser]) >= 2) {
                echo 'Ha ganado el ' . $winner . PHP_EOL;
            } else {
                echo self::POINTS[$counter[self::P1]] . ' - ' . self::POINTS[$counter[self::P2]] . PHP_EOL;
            }

        }

    }

}