<?php

namespace AntonioEduardo\EstudoPhp\Entities;

class PagamentoPix extends Pagamento
{
    const TAXA_FIXA = 0.00;
    function taxa(): float
    {
        return self::TAXA_FIXA;
    }

}