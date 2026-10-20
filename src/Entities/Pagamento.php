<?php

namespace AntonioEduardo\EstudoPhp\Entities;

abstract class Pagamento
{
    public function __construct(private float $valor)
    {
        $this->valor = $valor;
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