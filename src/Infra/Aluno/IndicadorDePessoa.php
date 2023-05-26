<?php

namespace Clean\Arquitetura\Infra\Aluno;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use Clean\Arquitetura\Dominio\Aluno\DefinirData;
use Clean\Arquitetura\Dominio\CPF;
use Clean\Arquitetura\Dominio\Indicacao\RepositorioIndicacao;
use PDO;

class IndicadorDePessoa implements RepositorioIndicacao
{

    private PDO $conexao;
    private DefinirData $data;

    public function __construct(PDO $conexao, DefinirData $data)
    {
        $this->conexao = $conexao;
        $this->data = $data;
    }
    public function criarIndicacao(Aluno $indicante, Aluno $indicado, DefinirData $data): bool
    {

        $sql = "INSERT INTO indicacoes VALUES (:cpf_indicante, :cpf_indicado, data_indicacao)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf_indicante', $indicante->cpf());
        $stmt->bindValue(':cpf_indicado', $indicado->cpf());
        $stmt->bindValue(':data_indicacao', $this->data->data());

        return $stmt->execute();
    }

    public function visualizarIndicacoes(): array
    {
        $sql = "SELECT * FROM indicacoes";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
