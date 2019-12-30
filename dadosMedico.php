<?php

require('./Classes/config.inc.php');

$Medico = new medico();

$Cadastrar = new Insert();

$update = new UpdateDados();

$verificadados = new VerificaDados();

        if(isset($_POST['id'])):
            $Medico->setId_medico($_POST['id']);
        endif;


        if(isset($_POST['nome'])):
            $Medico->setNome($_POST['nome']);
        endif;

        if(isset($_POST['nascimento'])):
            $Data_Nascimento = explode('/', $_POST['nascimento']);
            $Medico->setNascimento("{$Data_Nascimento[2]}-{$Data_Nascimento[1]}-{$Data_Nascimento[0]}");

        endif;

        if(isset($_POST['telefone'])):
            $Medico->setTelefone($_POST['telefone']);
        endif;

        if(isset($_POST['watshapp'])):
            $Medico->setWhatswapp($_POST['watshapp']);
        endif;

        if(isset($_POST['salario'])):
          $Medico->setMedia_salarial($_POST['salario']);  
        endif;

        if(isset($_POST['especialidade_medico'])):
            $Medico->setEspecialidade_medico($_POST['especialidade_medico']);
        endif;

if(isset($_POST['acao'])):
    if($_POST['acao']==1):
        
        if($Medico->getId_medico() >= 1):
            $update->updateDadosMedicos($Medico);
            echo 1;
        endif;
        
    endif;

endif;


if(isset($_POST['cpf'])):
    $Medico->setCpf($_POST['cpf']);
    if($Medico->getId_medico()>0):
         if(!$verificadados->verificaCpf($Medico)):
            $update->updateMedicoCpf($Medico);
            echo 1;
         endif;
    endif;
endif;



if(isset($_POST['email'])):
    $Medico->setEmail($_POST['email']);
    if($Medico->getId_medico()>0):
        if(!$verificadados->VerificaEmailCadastrado($Medico)):
            $update->updateMedicoEmail($Medico);
            echo 1;
        endif;
    endif;
endif;



if(isset($_POST['crm'])):
   $Medico->setCrn($_POST['crm']);
    if($Medico->getId_medico()>0):
        if(!$verificadados->verificaCrm($Medico)):
            $update->updateMedicoCrm($Medico);
           
            echo 1;
        endif;
    endif;
endif;




if($Medico->getId_medico() < 1):
    if(!$verificadados->verificaNome($Medico)):
        
        if(!$verificadados->verificaCpf($Medico)):
            
            if(!$verificadados->verificaCrm($Medico)):
               
                $Cadastrar->CadastrarMedicos($Medico);
                    echo 1;
            else:
               echo 0;
            endif;
            
        else:
            echo'<script type="text/javascript">
                    alert("CPF ja existente!");
                    location.href="cadastrarMedico.php";    
                </script>';       
        endif;
        
    else:
        echo'<script type="text/javascript">
                alert("Nome ja existente!");
                location.href="cadastrarMedico.php";    
            </script>';  
    endif;

    
   // header("Location: index.php");
endif;

