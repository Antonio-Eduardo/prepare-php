<?php

namespace AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Exceptions;

class EstoqueInsuficienteException extends \Exception
{
public function __construct(string $produto, int $pedido, int $quantidade){
    parent::__construct($produto, $pedido, $quantidade);
}
}