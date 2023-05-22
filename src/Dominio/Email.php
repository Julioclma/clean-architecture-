<?php

namespace Clean\Arquitetura\Dominio;

use InvalidArgumentException;


class Email
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        if (!filter_var($endereco, FILTER_VALIDATE_EMAIL)) {
            throw  new InvalidArgumentException('E-mail inválido!');
        }
        $this->endereco = $endereco;
    }

    public function __toString(): string
    {
        return $this->endereco;
    }
}
