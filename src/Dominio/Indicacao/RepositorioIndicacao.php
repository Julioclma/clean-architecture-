<?php

namespace Clean\Arquitetura\Dominio\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;

interface RepositorioIndicacao
{

    public function criarIndicacao(Aluno $indicante, Aluno $indicado, DefinirData $data) : bool;

    public function visualizarIndicacoes() : array;
}
