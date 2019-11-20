<?php

require('./Classes/config.inc.php');

$Medico = new medico();

$Cadastrar = new Insert();

$update = new UpdateDados();

$verificadados = new VerificaDados();

if(isset($_POST['nome'])):
    $Medico->setNome($_POST['nome']);
endif;

if(isset($_POST['cpf'])):
    $Medico->setCpf($_POST['cpf']);
endif;

if(isset($_POST['nascimento'])):
    $Medico->setNascimento($_POST['nascimento']);
endif;

if(isset($_POST['email'])):
    $Medico->setEmail($_POST['email']);
endif;

if(isset($_POST['telefone'])):
    $Medico->setTelefone($_POST['telefone']);
endif;

if(isset($_POST['watshapp'])):
    $Medico->setWhatswapp($_POST['watshapp']);
endif;

if(isset($_POST['crm'])):
   $Medico->setCrn($_POST['crm']); 
endif;

if(isset($_POST['salario'])):
  $Medico->setMedia_salarial($_POST['salario']);  
endif;

if(isset($_POST['especialidade_medico'])):
    $Medico->setEspecialidade_medico($_POST['especialidade_medico']);
endif;

if(isset($_POST['id'])):
    $Medico->setId_medico($_POST['id']);
endif;

if($Medico->getId_medico() < 1):
    if(!$verificadados->verificaNome($Medico)):
        
        if(!$verificadados->verificaCpf($Medico)):
            
            if(!$verificadados->verificaCrm($Medico)):
                
                $Cadastrar->CadastrarMedicos($Medico);
            
                if($Cadastrar->getTrueFalse()==true):
                   echo'<script type="text/javascript">
                        alert("Cadastrado com Sucesso!");
                        location.href="index.php";    
                    </script>';
                endif;
                
            else:
              echo'<script type="text/javascript">
                    alert("CRM ja existente!");
                    location.href="cadastrarMedico.php";    
                </script>';  
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
elseif($Medico->getId_medico() >= 1):
    $update->updateMedico($Medico);
    header("Location: index.php");
endif;

