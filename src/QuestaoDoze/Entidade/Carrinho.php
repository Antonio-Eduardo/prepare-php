<?php

namespace AntonioEduardo\EstudoPhp\QuestaoDoze\Entidade;

use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Exceptions\EstoqueInsuficienteException;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Excecao\CarrinhoVazioException;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Interface\Tributavel;
use AntonioEduardo\EstudoPhp\QuestaoDoze\Trait\FormataMoeda;

class Carrinho
{
    use FormataMoeda;
    public function __construct(private array $itens = []){}

    public function adicionarNoCarrinho(Tributavel $item): void
    {
        $this->itens[] = $item;
    }
    public function total(): float
    {
        if (empty($this->itens)) {
            throw new CarrinhoVazioException();
        }
        return array_sum(array_map(fn(Tributavel $item) => $item->valorComImposto(),
            $this->itens));
    }
    public function filtrar(callable $criterio): array
    {
        return array_filter($this->itens, $criterio);
    }
    public function imprimirTotal(): string
    {
        return $this->formataMoeda($this->total());
    }
    public function getItens(): array
    {
        return $this->itens;
    }
    public function setItens(array $itens): void
    {
        $this->itens = $itens;
    }
}