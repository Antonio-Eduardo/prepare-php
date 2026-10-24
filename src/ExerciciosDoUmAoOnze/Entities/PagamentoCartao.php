<?php

namespace AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities;

class PagamentoCartao extends Pagamento
{
    const TAXA_FIXA = 0.03;
    function taxa(): float
    {
        return self::TAXA_FIXA;
    }

}