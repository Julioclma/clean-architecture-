<?php

namespace Clean\Arquitetura\Infra\Indicacao;

use Clean\Arquitetura\Dominio\Indicacao\DefinirData;
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
