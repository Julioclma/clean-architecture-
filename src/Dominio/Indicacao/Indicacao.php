<?php

namespace Clean\Arquitetura\Dominio\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use Clean\Arquitetura\Dominio\Aluno\DefinirData;
use DateTime;

class Indicacao
{

    private Aluno $indicante;
    private Aluno $indicado;
    private DefinirData $data;

    public function __construct(Aluno $indicante, Aluno $indicado, DefinirData $data)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;
        $this->data = $data;
    }

}
