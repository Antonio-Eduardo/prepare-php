<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze;

use AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade\Carrinho;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade\Item;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade\Servico;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Excecao\CarrinhoVazioException;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Interface\Tributavel;

class ImplementaQuestaoDoze
{
    public function executar(): void
    {
        $this->testaCarrinhoVazio();
        $this->testaCarrinhoMisturado();
    }

    private function testaCarrinhoVazio(): void
    {
        $carrinho = new Carrinho();

        try {
            echo $carrinho->total(), "\n";
        } catch (CarrinhoVazioException $e) {
            echo "Erro: ", $e->getMessage(), "\n";
        }
    }

    private function testaCarrinhoMisturado(): void
    {
        $carrinho = new Carrinho();
        $carrinho->adicionarNoCarrinho(new Item('Mouse', 2, 50));
        $carrinho->adicionarNoCarrinho(new Item('Cabo', 3, 10));
        $carrinho->adicionarNoCarrinho(new Servico('Formatacao', 2, 80));

        echo "Total: R$ ", $carrinho->imprimirTotal(), "\n";

        $caros = $carrinho->filtrar(fn(Tributavel $item) => $item->valorComImposto() > 100);

        echo "Itens acima de R$ 100,00:\n";
        foreach ($caros as $item) {
            echo "- ", $item->getNome(), ": R$ ", $carrinho->formataMoeda($item->valorComImposto()), "\n";
        }
    }
}
