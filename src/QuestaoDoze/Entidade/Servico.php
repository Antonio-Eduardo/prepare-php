<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade;

use AntonioEduardo\EstudoPhp\QuestaoDoze\Interface\Tributavel;

class Servico implements Tributavel
{
    const TAXA = 0.05;
    public function __construct(private string $nome, private int $horas, private int $valorHora){}

    function valorComImposto(): float
    {
        return ($this->valorHora * $this->horas) * (1 + self::TAXA);
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
