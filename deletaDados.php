<?php
require('./Classes/config.inc.php');

$Medico = new medico();

$Eespecialidade = new especialidades();

$Delete = new DeleteDados();


if(isset($_POST['deletar'])):
    if($_POST['deletar']=="medico"):
        if(isset($_POST['deleta_medico'])):
            $Medico->setId_medico($_POST['deleta_medico']);
            $Delete->deleteMedico($Medico);
            echo'<script type="text/javascript">
                    alert("Deletado com Sucesso!");
                    location.href="index.php";    
            </script>';
        endif;
    endif;
endif;

