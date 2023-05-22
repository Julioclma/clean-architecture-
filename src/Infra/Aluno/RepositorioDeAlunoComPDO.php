<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\RepositorioAluno;

class RepositorioDeAlunoComPDO implements RepositorioAluno
{
    public function adicionar(Aluno $aluno) : void
    {

    }

    public function buscarPorCpf(CPF $cpf) : Aluno
    {

    }

    public function buscarTodos() : array
    {

    }

    public function removerPorCpf(CPF $cpf) : void
    {
        
    }

}
