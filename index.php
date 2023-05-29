<?php

use Clean\Arquitetura\Aplicacao\Indicacao\EnviarEmailMail;
use Clean\Arquitetura\Dominio\Aluno\Aluno;

include_once 'vendor/autoload.php';




 (new EnviarEmailMail(
    Aluno::comCpfEmailNome("48971295830", "julioclmafra@gmail.com", "julio")
))->send();

// $aluno = Aluno::comCpfEmailNome("48971295830", "julio@yahoo.com", "julio mafra");

// var_dump($aluno->cpf());