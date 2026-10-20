<?php

declare(strict_types=1);

//nome completo da classe
namespace AntonioEduardo\EstudoPhp\Entities;

//Qual classe é usada
use AntonioEduardo\EstudoPhp\Enums\Categoria;
use AntonioEduardo\EstudoPhp\Interfaces\Tributavel;

//Não se usa final e readonly em entidades por elas mudarem ao longo da vida, foi usado aqui por mera praticidade e por ser um exercicio
final class Produto extends ClasseComConstante implements Tributavel
{

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
    public function totalComDesconto(): float{
        return ($this->totalComImposto() * parent::TAXA_CONSTANTE()) - $this->totalComImposto();
    }
}