<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze\Excecao;

class CarrinhoVazioException extends \Exception
{
public function __construct()
{
    parent::__construct( 'O carrinho está vazio');
}
}