<?php

namespace AntonioEduardo\EstudoPhp\Exceptions;

use Throwable;

class EstoqueInsuficienteException extends \Exception
{
public function __construct(string $produto, int $pedido, int $quantidade){
    parent::__construct($produto, $pedido, $quantidade);
}
}