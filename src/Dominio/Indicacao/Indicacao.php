<?php

namespace Clean\Arquitetura\Dominio\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use DateTime;

class Indicacao
{

    private Aluno $indicante;
    private Aluno $indicado;
    private DateTime $data;

    public function __construct(Aluno $indicante, Aluno $indicado, DateTime $data)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;
        $this->data = $data;

    }

}
