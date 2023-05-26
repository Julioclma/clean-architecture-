<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaMD5 implements CifradorDeSenha
{
    public function cifrar(string $senha): string
    {
        return md5($senha);
    }
    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
    {

        return md5($senhaEmTexto) === $senhaCifrada;
    }
}
