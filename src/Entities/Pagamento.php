<?php

namespace AntonioEduardo\EstudoPhp\Entities;
use AntonioEduardo\EstudoPhp\Traits\FormataMoeda;
abstract class Pagamento
{
    use FormataMoeda;
    public function __construct(private float $valor)
    {
        $this->valor = $valor;
    }
    public function valorFinal(): string
    {
        return $this->formatarMoeda($this->valor * (1 + $this->taxa()));
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