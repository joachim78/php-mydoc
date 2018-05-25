<?php
declare(strict_types = 1);

class Toto
{
    /**
     * @param int $a
     * @return float|int
     * @throws Exception
     */
    function plop(int $a) {
        if (!$a) {
            throw new \Exception("Division par zéro");
        }
        return 100 / $a;
    }
}