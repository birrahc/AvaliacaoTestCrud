<!DOCTYPE html>
<?php
require ('./Classes/config.inc.php');
$Medico = new medico();
$Esp = new especialidades();

$selectDados = new SelectDados();

$acaoPagina = "Cadastrar Médico";

$submit="Cadastrar";

if(isset($_POST['medico'])):
    $Medico->setId_medico($_POST['medico']);
    $selectDados->dadosMedicos($Medico);
    $acaoPagina = "Editar Dados Médico";
    $submit = "Editar";
endif;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Classes/css/estilo.css">
        <title><?php echo $acaoPagina ?></title>
    </head>
    <body>
        <header>
            
        </header>
        
        <main>
            <section>
                <div class="div-25 cadastro">
                    <h1> <?php echo $acaoPagina ?> </h1>
                    <form action="dadosMedico.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $Medico->getId_medico() ?>">
                        <input type="text" name="nome" placeholder="Nome" value="<?php echo $Medico->getNome() ?>">
                        <input type="text" name="cpf" placeholder="CPF" value="<?php echo $Medico->getCpf() ?>">
                        <input type="date" name="nascimento" value="<?php echo $Medico->getNascimento() ?>">
                        <input type="email" name="email" placeholder="E-Mail" value="<?php echo $Medico->getEmail() ?>">
                        <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $Medico->getTelefone() ?>">
                        <input type="text" name="watshapp" placeholder="Watshapp" value="<?php echo $Medico->getWhatswapp() ?>">
                        <input type="text" name="crm" placeholder="CRM" value="<?php echo $Medico->getCrn() ?>">
                        <input type="text" name="salario" placeholder="Salário" value="<?php echo $Medico->getMedia_salarial() ?>">
                        <select name="especialidade_medico">
                        <?php
                        if($Medico->getEspecialidade_nome()&& $Medico->getId_especialidade()):
                            echo"<option value='{$Medico->getId_especialidade()}'>{$Medico->getEspecialidade_nome()}</option>";
                        else:
                            echo"<option>Especialidade</option>";
                        endif;
                        $selectDados->dadosEpcialidade($Esp);
                        ?>
                    </select>
                    
                    <button type="submit"><?php echo $submit ?></button>
                    
                    </form>
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
