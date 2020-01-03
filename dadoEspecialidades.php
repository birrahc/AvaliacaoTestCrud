<?php
require('./Classes/config.inc.php');

$Especialidade = new especialidades();
$cadastrar = new Insert();
$Atualizar = new UpdateDados();
$verificaDados = new VerificaDados();

if(isset($_POST['especialidade'])):
    $Especialidade->setEspecialidade_nome(ucwords($_POST['especialidade']));
endif;

if(isset($_POST['cod'])):
    $Especialidade->setId_especialidade($_POST['cod']);
endif;

if($Especialidade->getId_especialidade() < 1):
    if(!$verificaDados->verificaEspecialidade($Especialidade)):
        $cadastrar->inserirEspecialidades($Especialidade);
        echo 1;
    else:
      echo 0;  
    endif;
    
elseif($Especialidade->getId_especialidade() >= 1):
    if(!$verificaDados->verificaEspecialidade($Especialidade)):
        
        $Atualizar->updateEspecialidade($Especialidade);
    
        echo 1;
    else:
      echo 0;  
    endif;
endif;