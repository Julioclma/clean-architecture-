<?php

namespace Clean\Arquitetura\Aplicacao\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;

interface EnviaEmailDeIndicacao
{

    public function __construct(Aluno $alunoIndicado);

    public function send(): bool;

    public function to(): string;

    public function subject(): string;

    public function message(): string;
}
