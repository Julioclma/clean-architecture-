<?php

namespace Clean\Arquitetura\Dominio;

use InvalidArgumentException;

class CPF
{
    private string $digito;

    public function __construct(string $digito)
    {
        $this->validateCpf($digito);
    }

    public function validateCpf(string $digito): void
    {

        if(strlen($digito) > 6){

            $this->$digito = $digito;
        }

      throw new InvalidArgumentException("CPF INVÁLIDO!");
      
    }

    public function __toString(): string
    {
        return $this->digito;
    }
}
