<?php

declare(strict_types=1);

//nome completo da classe
namespace AntonioEduardo\EstudoPhp\Entities;

//Qual classe é usada
use AntonioEduardo\EstudoPhp\Enums\Categoria;
use AntonioEduardo\EstudoPhp\Interfaces\Tributavel;
use AntonioEduardo\EstudoPhp\Traits\FormataMoeda;

//Não se usa final e readonly em entidades por elas mudarem ao longo da vida, foi usado aqui por mera praticidade e por ser um exercicio
final class Produto extends ClasseComConstante implements Tributavel
{
    use FormataMoeda;
    //atributos necessarios pra criação da classe dentro do construtor
    public function __construct(
        public string    $nome,
        public float     $preco,
        public int       $quantidade,
        public Categoria $categoria,
    ){}

    //Aqui é definido como visibilidade > function > nome do metodo > tipo do retorno
    public function totalComImposto(): float
    {
        return (1 + $this->categoria->taxa()) * $this->preco * $this->quantidade;
    }

    //Parent pra acessar a classe extendida
    public function totalComDesconto(): string{
        return $this->formatarMoeda(($this->totalComImposto() * parent::TAXA_CONSTANTE()) - $this->totalComImposto());
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria): void
    {
        $this->categoria = $categoria;
    }

}