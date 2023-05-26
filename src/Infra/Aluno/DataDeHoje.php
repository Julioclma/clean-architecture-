<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\DefinirData;
use DateTime;
use DateTimeZone;

class DataDeHoje implements DefinirData
{
    public function data(): string
    {
        $today = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        return $today->format('Y/m/d');
    }

}
