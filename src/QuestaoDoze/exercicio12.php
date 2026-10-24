<?php
/*Exercicio 12 - Juntando tudo
 * Crie a classe Carrinho com:
 *   - uma lista privada de itens Tributavel, comecando vazia;
 *   - adicionar(Tributavel $item): void;
 *   - total(): float, somando o totalComImposto() de todos os itens;
 *   - filtrar(callable $criterio): array, que devolve os itens que passam no criterio;
 *   - a trait FormataMoeda, para imprimir o total formatado.
 * Regra: se total() for chamado com o carrinho vazio, lance uma exception sua, CarrinhoVazioException.
 * Teste com produtos e servicos misturados, filtre por um criterio usando closure
 * e trate o caso do carrinho vazio com try/catch.
 */

require __DIR__ . '/../../vendor/autoload.php';

use AntonioEduardo\EstudoPhp\QuestaoDoze\ImplementaQuestaoDoze;

(new ImplementaQuestaoDoze())->executar();
