<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use AntonioEduardo\EstudoPhp\Entities\Produto;
use AntonioEduardo\EstudoPhp\Enums\Categoria;

$produto = new Produto("carne", 12.30, 2, Categoria::Alimento);

echo $produto->nome, " / ",
$produto->preco, " / ",
$produto->quantidade, " / ",
$produto->totalComImposto(), " / ",
$produto->categoria->value, "\n";

$valorDesconto = $produto->totalComDesconto();
$statusPagamento = $produto->Pagar($valorDesconto);
if ($statusPagamento) {
    echo $produto->nome, " | Pagamento feito com sucesso!\n";
}else{
    echo $produto->nome, " | Pagamento feito com erro!\n";
}