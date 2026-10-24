<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities\Produto;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Enums\Categoria;

$produto = new Produto("carne", 12.30, 2, Categoria::Alimento);

echo $produto->nome, " / ",
$produto->preco, " / ",
$produto->quantidade, " / ",
$produto->totalComImposto(), " / ",
$produto->categoria->value, "\n";

$valorDesconto = $produto->totalComDesconto();