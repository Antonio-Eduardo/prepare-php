<?php

namespace AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities;

class ClasseComConstante
{
    private const TAXA_CONSTANTE = 0.02;

    public static function TAXA_CONSTANTE(): float{
        return self::TAXA_CONSTANTE;
    }
}