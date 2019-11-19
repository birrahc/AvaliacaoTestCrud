<?php
require('./Classes/config.inc.php');

$Especialidade = new especialidades();
$cadastrar = new Insert();

if(isset($_POST['especialidade'])):
    $Especialidade->setEspecialidade_nome($_POST['especialidade']);
endif;

if(isset($_POST['cod'])):
    $Especialidade->setId_especialidade($_POST['cod']);
endif;

if($Especialidade->getId_especialidade() < 1):
    $cadastrar->inserirEspecialidades($Especialidade);
endif;