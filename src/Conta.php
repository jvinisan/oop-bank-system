<?php

class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;
    private static int $numeroDeContas = 0;

    // Construtor
    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->validarNomeTitular($nomeTitular);
        $this->$nomeTitular = $nomeTitular;
        $this->saldo = 0;
        self::$numeroDeContas++;
    }

    // Getters
    public function recuperarCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function recuperarNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }
    public static function RecuperarNumerodeContas(): int
    {
        return self::$numeroDeContas;
    }

    // Métodos
    public function sacar(float $valorAsacar): void
    {
        if ($valorAsacar < $this->saldo) {
            echo 'Saldo indisponível';
            return;
        }

        $this->saldo -= $valorAsacar;
    }

    public function depositar(float $valorAdepositar): void
    {
        if ($valorAdepositar < 0) {
            echo 'Este valor é inválido. Necessita ser positivo';
            return;
        }

        $this->saldo += $valorAdepositar;
    }

    public function transferir(float $valorAtranferir, Conta $contaDestino)
    {
        if ($valorAtranferir > $this->saldo) {
            echo 'Saldo indisponível';
            return;
        }

        $this->sacar($valorAtranferir);
        $contaDestino->depositar($valorAtranferir);
    }

    private function validarNomeTitular(string $nomeTitular): void
    {
        if (strlen($nomeTitular) < 5) {
            echo 'ERRO: O nome deverá ter no mínimo 5 carcteres';
            exit();
        }
    }
}
