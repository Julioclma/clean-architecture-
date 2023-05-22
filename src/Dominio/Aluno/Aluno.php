<?php

namespace Clean\Arquitetura\Dominio\Aluno;

use Clean\Arquitetura\Dominio\CPF;
use Clean\Arquitetura\Dominio\Email;

class Aluno
{

    private string $nome;
    private CPF $cpf;
    private Email $email;
    private array $telefones;

    public static function comCpfEmailNome(string $cpf, string $email, string $nome): self
    {
       return new Aluno($nome, new CPF($cpf), new Email($email));
    }

    public function __construct(string $nome, CPF $cpf, Email $email)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
    }
    
}

$aluno = Aluno::comCpfEmailNome("48971295830", "julio@yahoo.com", "julio mafra");