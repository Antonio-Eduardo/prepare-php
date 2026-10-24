<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze\Trait;

trait FormataMoeda
{
public function formataMoeda($valor) : string{
    return number_format($valor, 2, ',', '.');
}
}