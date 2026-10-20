<?php

namespace AntonioEduardo\EstudoPhp\Entities;

abstract class Pagamento
{
    public function __construct(private float $valor)
    {
        $this->valor = $valor;
    }
    public function valorFinal(): float
    {
        return $this->valor * (1 + $this->taxa());
    }
    abstract function taxa(): float;
    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

}