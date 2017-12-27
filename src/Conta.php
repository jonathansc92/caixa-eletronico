<?php

session_start();

class Conta {

    private $valor;
    private $saldo;

    public function getValor() {
        return $this->valor;
    }

    public function setValor($p) {
        $this->valor = $p;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setSaldo($p) {
        $this->saldo = $p;
    }

    public function depositar() {
        $saldo = $this->getValor() + $this->getSaldo();
        
        $this->setSaldo($saldo);
        
    }

    public function sacar() {
        
    }

}
