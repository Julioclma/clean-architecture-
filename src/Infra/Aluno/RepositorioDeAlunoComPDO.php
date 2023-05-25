<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use Clean\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Clean\Arquitetura\Dominio\CPF;
use Clean\Arquitetura\Dominio\Email;
use PDO;

class RepositorioDeAlunoComPDO implements RepositorioAluno
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionar(Aluno $aluno): void
    {

        $query = 'INSERT INTO alunos VALUES (:cpf, :nome, :email)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':cpf', $aluno->cpf());
        $stmt->bindValue(':nome', $aluno->nome());
        $stmt->bindValue(':email', $aluno->email());
        $stmt->execute();

        $query = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
        
        $stmt = $this->conexao->prepare($query);

        foreach ($aluno->telefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('numero', $telefone->numero());
            $stmt->bindValue('cpf_aluno', $aluno->cpf());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
        $query = 'SELECT * FROM alunos WHERE cpf = :cpf';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();
        $aluno = $stmt->fetch(\PDO::FETCH_ASSOC);
        return Aluno::comCpfEmailNome($aluno['cpf'], $aluno['email'], $aluno['nome']);
    }

    public function buscarTodos(): array
    {
        $query = 'SELECT * FROM alunos';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $alunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($alunos as $aluno) {
            $result[] = Aluno::comCpfEmailNome($aluno['cpf'], $aluno['email'], $aluno['nome']);
        }
 
        return $result;
    }

    public function removerPorCpf(CPF $cpf): void
    {
        $query = 'DELETE FROM alunos WHERE cpf = :cpf';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':cpf', $cpf);

        $stmt->execute();
    }
}
