<?php
require('./Classes/config.inc.php');

$Medico = new medico();

$Eespecialidade = new especialidades();

$Delete = new DeleteDados();


if(isset($_POST['deletar'])):
    if($_POST['deletar']=="medico"):
        if(isset($_POST['crm_med'])):
            $Medico->setCrn($_POST['crm_med']);
        
            if(empty($Medico->getCrn())|| $Medico == null):
               // echo"campo nao vazio";
            
                if(isset($_POST['deleta_medico'])):
                    $Medico->setId_medico($_POST['deleta_medico']);
                    $Delete->deleteMedico($Medico);
                    echo 1; //alert("Deletado com Sucesso!");
                endif;
            else:
                echo 0; //Medicos Com CRM cadastrado nao podem ser excluidos!
            endif;
            
        endif;
    elseif($_POST['deletar']=="especialidade"):
        if(isset($_POST['excluir_esp'])):
            $Eespecialidade->setId_especialidade($_POST['excluir_esp']);
            $Delete->deleteEspecialidades($Eespecialidade);
            echo 1; //Deletado com Sucesso!
        else:
            echo 0;
        endif;
    endif;
    
endif;

