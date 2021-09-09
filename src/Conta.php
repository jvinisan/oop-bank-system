<?php

class Conta
{
    public string $cpfTitular;
    public string $nomeTitular;
    public float $saldo = 0;

    public function sacar(float $valorAsacar): void
    {
        if ($valorAsacar < $this->saldo) {
            echo 'Saldo indisponível';
        } else {
            $this->saldo -= $valorAsacar;
        }
    }

    public function depositar(float $valorAdepositar): void
    {
        if ($valorAdepositar < 0) {
            echo 'Este valor é inválido. Necessita ser positivo';
        } else {
            $this->saldo += $valorAdepositar;
        }
    }

    public function transferir(float $valorAtranferir, Conta $contaDestino)
    {
        if ($valorAtranferir > $this->saldo) {
            echo 'Saldo indisponível';
        } else {
            $this->sacar($valorAtranferir);
            $contaDestino->depositar($valorAtranferir);
        }
    }
}
