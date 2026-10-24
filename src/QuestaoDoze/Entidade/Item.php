<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade;

use AntonioEduardo\EstudoPhp\QuestaoDoze\Interface\Tributavel;

class Item implements Tributavel
{
    const TAXA = 0.1;
public function __construct(private string $nome, private int $quantidade, private int $valor){}

    public function getNome(): string
    {
        return $this->nome;
    }

    function valorComImposto(): float
    {
        return ($this->valor * $this->quantidade) * (1 + self::TAXA);
    }
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function setValor(int $valor): void
    {
        $this->valor = $valor;
    }

}