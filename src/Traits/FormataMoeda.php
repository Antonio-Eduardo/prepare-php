<?php

namespace AntonioEduardo\EstudoPhp\Traits;
trait FormataMoeda
{
public function formatarMoeda(float $valor): string{
   return number_format($valor, 2, ',', '.');
}
}