<?php

namespace Clean\Arquitetura\Dominio\Aluno;

use InvalidArgumentException;

class Telefone
{

    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }

    public function setDDD(string $ddd): void
    {
        if (strlen($ddd) === 2) {
            $this->ddd = $ddd;
        }

        throw new InvalidArgumentException("DDD INVÁLIDO!");
    }

    public function setNumero(string $numero): void
    {
        if (strlen($numero) === 9 || strlen($numero) === 8) {
            $this->numero = $numero;
        }

        throw new InvalidArgumentException("Número INVÁLIDO!");
    }

    public function ddd() : string
    {
        return $this->ddd;
    }

    public function numero() : string
    {
        return $this->numero;
    }

    public function __toString(): string
    {
        return "{$this->ddd} {$this->numero}";
    }
}
