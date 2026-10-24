<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

/*Exercicio 1
Variáveis e saída. Guarde seu nome e sua idade em variáveis e imprima “Olá, NOME, você tem X anos” com echo.
Depois faça a mesma frase com interpolação (aspas duplas) e com concatenação (o operador é ., não +).
*/

$nome = "Antonio Eduardo";
$idade = 23;

$classificacao = classificarIdade($idade);

echo "Olá $nome! Você tem $idade anos! Classificado como: $classificacao.\n";
echo 'Olá ' . $nome . '! Você tem ' . $idade . ' anos! Classificado como: ' . $classificacao . '.' . "\n\n";

/*Exercicio 2
2. Condicional e função. Crie uma função classificaIdade(int $idade): string que devolva “menor”,
 “adulto” ou “idoso”. Teste com três valores.
*/
function classificarIdade(int $i): string
{
    if ($i > 18 && $i < 60) {
        return "adulto";
    } elseif ($i >= 60) {
        return "idoso";
    } else {
        return "menor";
    }
}

/*Exercicio 3
 Array como lista. Crie um array com cinco números. Percorra com foreach e imprima só os pares.
Depois some todos sem usar array_sum, e em seguida confira com ele.
*/

$numeros = [2, 4, 5, 6, 7];
$soma = 0;

foreach ($numeros as $numero) {
    if ($numero % 2 == 0) {
        echo $numero . "\n";
    }
    $soma += $numero;
}
$somaArray = array_sum($numeros);
echo "Soma dentro do foreach: $soma. Soma com array: $somaArray.\n\n";

/*Exercicio 4
Array associativo. Crie um array com chaves nome, preco e quantidade representando um produto. Imprima o total (preço vezes quantidade).
Depois crie uma lista com três produtos e some o total geral.
*/

$arrayAssociativo = [
    "nome" => "Miojo",
    "preco" => 7.90,
    "quantidade" => 13
];
$nomeAssociativo = $arrayAssociativo["nome"];
$preco = $arrayAssociativo["preco"];
$quantidade = $arrayAssociativo["quantidade"];
$precoTotal = $preco * $quantidade;

echo "$nomeAssociativo tem o preço total de $precoTotal.\n";

$produtos = [
    ["nome" => "coca-cola", "preco" => 3.90, "quantidade" => 4],
    ["nome" => "carne", "preco" => 52.90, "quantidade" => 5],
    ["nome" => "amendoim", "preco" => 64.00, "quantidade" => 3],
];
$precoTotalLista = 0;
foreach ($produtos as $produto) {
    $precoTotalLista += $produto["preco"] * $produto["quantidade"];
}
echo "Preço total da lista: $precoTotalLista\n";

$precoTotalLista = array_sum(array_map(fn($p) => $p["preco"] * $p["quantidade"], $produtos));

echo "Preço total da lista calculado com array_sum e _map: $precoTotalLista\n";

/*Exercicio 5
Com a lista de produtos do exercício 4, use array_filter para pegar os que custam mais de 50 e array_map para gerar uma lista só com os nomes.
 Aqui você vai ver o paralelo com os streams do Java.
*/

$valoresFiltrados = array_map(fn($p) => $p["nome"], array_filter($produtos, fn($p) => $p["preco"] > 50));
print_r($valoresFiltrados);
echo implode(", ", $valoresFiltrados);
echo "\n";

/*Exercicio 6
 * Classe. Crie uma classe Produto com propriedades tipadas e construtor (use a sintaxe de promoção de propriedades do
 * PHP 8: public function __construct(public string $nome, public float $preco)).
 * Adicione um método totalComImposto(float $taxa): float. Instancie dois produtos e imprima
 */
