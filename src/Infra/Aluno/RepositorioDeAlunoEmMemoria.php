<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use Clean\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Clean\Arquitetura\Dominio\CPF;

class RepositorioDeAlunoEmMemoria implements RepositorioAluno
{

    private array $alunos;
    public function adicionar(Aluno $aluno) : void
    {

        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(CPF $cpf) : Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn(Aluno $aluno) => $aluno->cpf() == $cpf);

        if(count($alunosFiltrados) === 0){
            throw new ("Aluno não encontrado");
            
        }

        return $alunosFiltrados[0];

    }

    public function buscarTodos() : array
    {
        return $this->alunos;

    }

    public function removerPorCpf(CPF $cpf) : void
    {
        
    }
}
