<?php

namespace Clean\Arquitetura\Dominio\Aluno;

use Clean\Arquitetura\Dominio\CPF;

interface RepositorioAluno
{
    public function adicionar(Aluno $aluno) : void;

    public function buscarPorCpf(CPF $cpf) : Aluno;

    public function buscarTodos() : array;

    public function removerPorCpf(CPF $cpf) : void;


}
