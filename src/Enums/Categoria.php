<?php

declare(strict_types=1);

namespace AntonioEduardo\EstudoPhp\Enums;
enum Categoria: string
{
    //case define o valor possivel do enum
    //depois do = é definido o que o ->value vai retornar
    case Alimento = "alimento";
    case Bebida = "bebida";
    case Limpeza = "limpeza";

    public function taxa(): float
    {
        //O match compara o valor entre parênteses com cada opção à esquerda do =>, usando ===, e devolve o que está à direita da primeira que bater
        return match ($this) {
            self::Alimento => 0.01,
            self::Bebida => 0.02,
            self::Limpeza => 0.03,
        };
    }
}
