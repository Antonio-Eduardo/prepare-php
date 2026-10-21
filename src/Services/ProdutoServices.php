<?php

namespace AntonioEduardo\EstudoPhp\Services;
use AntonioEduardo\EstudoPhp\Entities\Produto;
use AntonioEduardo\EstudoPhp\Exceptions\EstoqueInsuficienteException;

class ProdutoServices
{
 public function criarProduto(Produto $produto): Produto{
     return $produto;
 }
 public function fazerPedido(Produto $produto, int $pedido): string
 {
     if ($produto->quantidade < $pedido) {
         throw new EstoqueInsuficienteException($produto->nome,$pedido,$produto->quantidade);
     }
     $produto->setQuantidade($produto->quantidade - $pedido);
     return "Pedido criado. O estoque atual do produto $produto->nome tem $produto->quantidade unidades\n";
 }
}