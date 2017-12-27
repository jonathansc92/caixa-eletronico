<?php


include_once 'Conta.php';


$action = filter_input(INPUT_GET, 'action');



switch ($action) {

    /**
     * 1 - Instanciar uma nova Conta
     * 2 - Deposita 10 reais na conta
     * 3 - Salvar a Conta na sessão
     * 4 - Enviar o saldo para cliente
     *
     */
    case 'iniciaConta':

        $conta =  new Conta();
        $conta->setSaldo(10);
        $_SESSION['saldo'] = serialize($conta);

        $ret['action'] = 'atualiza-saldo';
        $ret['valor'] = '10,00';
        break;

    case 'saque':
        $conta = new Conta();
        $conta->setValor($_POST['valor']);


        $conta->sacar();

        $ret['action'] = 'saque';
        $ret['valor'] = $conta->getValor();

        break;

    case 'deposito':
    
        $conta = unserialize($_SESSION['saldo']);
        $conta->setValor($_POST['valor']);
        
        $conta->depositar();
        
        $_SESSION['saldo'] = serialize($conta);
                
        $ret['action'] = 'atualiza-saldo';
        $ret['valor'] = $conta->getSaldo();


        break;

    default:
        break;
}
echo json_encode($ret);
