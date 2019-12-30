<?php

require('./Classes/config.inc.php');

$dados = new medico();

$consulta = new VerificaDados();

if(isset($_GET['cpf'])):
    
    $dados->setCpf($_GET['cpf']);
    $consulta->VerficaCampoCpf($dados);
    
elseif(isset($_GET['email'])):
    
    $dados->setEmail($_GET['email']);
    $consulta->VerificaEmailCadastrado($dados);
    
elseif(isset($_GET['nome'])):
    
    $dados->setNome($_GET['nome']);
    $consulta->verificaNome($dados);
    
elseif(isset($_GET['crm'])):
    $dados->setCrn($_GET['crm']);
    $consulta->VerificaCrmCadastrado($dados);
endif;


