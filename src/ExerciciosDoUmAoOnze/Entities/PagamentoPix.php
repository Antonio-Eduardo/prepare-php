<?php

namespace AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities;

class PagamentoPix extends Pagamento
{
    const TAXA_FIXA = 0.00;
    function taxa(): float
    {
        return self::TAXA_FIXA;
    }

}