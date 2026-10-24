<?php

declare(strict_types=1);
namespace AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Interfaces\Tributavel;
use DateTime;

date_default_timezone_set('America/Sao_Paulo');

class Servico implements Tributavel
{
    public const IMPOSTO_FIXO = 0.05;
    public function __construct(private string $nome, private float $valorHora, private DateTime $hora){}

    public function totalComImposto(): float
    {
        return ($this->valorHora * $this->hora->format('H')) * (1 + self::IMPOSTO_FIXO);
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getValorHora(): float
    {
        return $this->valorHora;
    }

    public function setValorHora(float $valorHora): void
    {
        $this->valorHora = $valorHora;
    }

    public function getHora(): DateTime
    {
        return $this->hora;
    }

    public function setHora(DateTime $hora): void
    {
        $this->hora = $hora;
    }

}