<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaPHP implements CifradorDeSenha
{

    public function cifrar(string $senha): string
    {
        return password_hash($senha, PASSWORD_ARGON2ID);
    }
    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
    {
        return password_verify($senhaEmTexto, $senhaCifrada);
    }
}
