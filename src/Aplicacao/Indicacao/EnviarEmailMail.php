<?php

namespace Clean\Arquitetura\Aplicacao\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;

class EnviarEmailMail implements EnviaEmailDeIndicacao
{
    private Aluno $alunoIndicado;

    public function __construct(Aluno $alunoIndicado)
    {
        $this->alunoIndicado = $alunoIndicado;
    }
    public function send(): bool
    {
        return mail($this->to(), $this->subject(), $this->message());
    }

    public function to(): string
    {
        return $this->alunoIndicado->email();
    }

    public function subject(): string
    {
        return "testando email";
    }

    public function message(): string
    {
        return "Estamos indicando o aluno de CPF " . $this->alunoIndicado->cpf();
    }
}

