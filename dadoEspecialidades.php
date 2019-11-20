<?php
require('./Classes/config.inc.php');

$Especialidade = new especialidades();
$cadastrar = new Insert();
$Atualizar = new UpdateDados();
$verificaDados = new VerificaDados();

if(isset($_POST['especialidade'])):
    $Especialidade->setEspecialidade_nome($_POST['especialidade']);
endif;

if(isset($_POST['cod'])):
    $Especialidade->setId_especialidade($_POST['cod']);
endif;

if($Especialidade->getId_especialidade() < 1):
    if(!$verificaDados->verificaEspecialidade($Especialidade)):
        $cadastrar->inserirEspecialidades($Especialidade);
        echo'<script type="text/javascript">
                alert("Cadastrado com Sucesso!");
                location.href="cadastrarEspecialidades.php";    
            </script>';
    else:
      echo'<script type="text/javascript">
                alert("Especialidade ja Cadastrada!");
                location.href="cadastrarEspecialidades.php";    
            </script>';  
    endif;
    
elseif($Especialidade->getId_especialidade() >= 1):
    if(!$verificaDados->verificaEspecialidade($Especialidade)):
        
        $Atualizar->updateEspecialidade($Especialidade);
    
        echo'<script type="text/javascript">
                alert("Dados Atualizados com Sucesso!");
                location.href="cadastrarEspecialidades.php";    
            </script>';
    else:
      echo'<script type="text/javascript">
                alert("Especialidade ja Cadastrada!");
                location.href="cadastrarEspecialidades.php";    
            </script>';  
    endif;
endif;