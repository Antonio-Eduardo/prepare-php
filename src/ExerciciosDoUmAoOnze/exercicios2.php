<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities\PagamentoCartao;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities\PagamentoPix;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities\Produto;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Entities\Servico;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Enums\Categoria;
use AntonioEduardo\EstudoPhp\ExerciciosDoUmAoOnze\Interfaces\Tributavel;

/*
1. Interfaces e classes abstratas: a sintaxe é quase a do Java e se aprende rápido. O Laravel injeta dependências por interface o tempo todo.
2. Traits: são exclusivas do PHP e não existem no Java. O Laravel usa em todo canto (use HasFactory;, use Notifiable; dentro dos models). Se você não souber o que são, vai estranhar o primeiro model.
3. Exceptions: try/catch/throw e como criar a sua própria exception. É parecido com o Java, mas sem exceções checadas (não existe throws obrigatório).
4. Closures e callables: você já viu fn e function. Falta o use ($variavel) para capturar variáveis de fora, que aparece nas rotas e nas queries do Laravel.
*/

 /* Exercicios 7 a 12: Interfaces, classes abstratas, traits, exceptions e closures.
 *
 * Organizacao: cada classe, interface, trait ou exception vai no proprio arquivo dentro de src/,
 * com namespace batendo com a pasta (mesma regra do Produto e da Categoria):
 *   src/Contracts/   Interfaces
 *   src/Traits/      traits
 *   src/Exceptions/  exceptions
 *   src/Entities/    classes concretas
 * Este arquivo fica so com os testes (instanciar, chamar e imprimir).
 */

/*Exercicio 7 - Interface
 * Crie a interface Tributavel em src/Contracts com um unico metodo: totalComImposto(): float.
 * Faca o Produto implementar Tributavel (ele ja tem o metodo, so falta o "implements").
 * Crie a classe Servico (nome, valorHora, horas) que tambem implementa Tributavel, com imposto fixo de 5%.
 * Crie uma funcao somarTotal(array $itens): float que recebe uma lista misturando Produto e Servico
 * Paralelo com o Java: a sintaxe e quase identica (interface, implements).
 */
function somarTotal(array $itens): float{
    return array_sum(array_map(fn(Tributavel $item) => $item->totalComImposto(),$itens));
}
$produtoUm = new Produto("carne", 12.30, 2, Categoria::Alimento);
$servicoUm = new Servico("Eduardo", 30.00, new DateTime('02:00:00'));
$arrayGeral = [$produtoUm, $servicoUm];
$somaGeral = somarTotal($arrayGeral);
echo $somaGeral;

/*Exercicio 8 - Classe abstrata
 * Crie a classe abstrata Pagamento com:
 *   - um atributo valor (float), recebido no construtor;
 *   - um metodo abstrato taxa(): float;
 *   - um metodo concreto valorFinal(): float que retorna valor * (1 + taxa()).
 * Crie PagamentoPix (taxa 0) e PagamentoCartao (taxa 0.03), que estendem Pagamento.
 * Instancie um de cada com valor 100 e imprima o valorFinal().
 */
$pagamentoCartao = new PagamentoCartao(100);
$pagamentoPix = new PagamentoPix(100);
echo "\nPagamento via cartao: " . $pagamentoCartao->valorFinal() , " Pagamento via pix: " . $pagamentoPix->valorFinal(), "\n";

/*Exercicio 9 - Trait
 * Traits nao existem no Java. Sao blocos de metodos que voce "cola" dentro de uma classe com `use NomeDaTrait;`
 * (o use dentro da classe, nao o use do topo do arquivo).
 * Crie a trait FormataMoeda em src/Traits com o metodo formatarMoeda(float $valor): string,
 * que retorna o valor no formato brasileiro: 24.846 vira "R$ 24,85". Pesquise a funcao number_format.
 * Use a trait no Produto e no Pagamento, e imprima o total de cada um formatado.
 * Pergunta para responder num comentario: por que isso nao poderia ser resolvido com heranca aqui?
 * Resposta: Só da pra herdar 1 classe e tanto pagamento quanto produto ja tem uma hierarquia propria, a outra opcao seria interface
 * pelo fator de que é possivel implementar varias interfaces e nao apenas uma, porem interfaces nao podem definir o corpo apenas o contrato do metodo
 * por isso a escolha viavel é usar traits que tambem podem ser usadas varias e podem ter corpo
 */

/*Exercicio 10 - Exceptions
 * Crie a exception EstoqueInsuficienteException em src/Exceptions, estendendo DomainException.
 * Crie a classe Estoque (nao readonly: ela muda) com:
 *   - um array associativo privado de nome do produto => quantidade, comecando vazio;
 *   - adicionar(string $nome, int $quantidade): void;
 *   - retirar(string $nome, int $quantidade): void.
 * Regras do retirar:
 *   - quantidade menor ou igual a zero: lance InvalidArgumentException (ja existe no PHP);
 *   - quantidade maior que o disponivel: lance EstoqueInsuficienteException com uma mensagem
 *     dizendo o produto, quanto tem e quanto foi pedido.
 * Teste os tres cenarios (sucesso, quantidade invalida, estoque insuficiente) com try/catch,
 * usando um catch separado para cada tipo de exception e um finally que imprime "operacao finalizada".
 * Paralelo com o Java: no PHP nao existe `throws` na assinatura nem exception checada.
 */

/*Exercicio 11 - Closures e use
 * Parte A: crie $desconto = 0.1 e uma closure com `function` que recebe um preco e aplica o desconto,
 * capturando $desconto com `use ($desconto)`. Depois de criar a closure, mude $desconto para 0.5 e chame a closure.
 * Anote num comentario qual desconto foi aplicado e por que.
 * Parte B: faca o mesmo com `fn` (sem use) e compare o comportamento.
 * Parte C: crie $contador = 0 e uma closure que incrementa o contador a cada chamada, usando `use (&$contador)`.
 * Chame tres vezes e imprima $contador. Anote o que o & muda.
 * Parte D: crie a funcao precoMinimo(float $minimo): callable, que retorna uma closure para usar no array_filter.
 * Use com uma lista de Produto: array_filter($produtos, precoMinimo(10)).
 */
