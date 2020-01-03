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
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        <script src="js/jquery-3.4.1.min.js" ></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/jquery.loading.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/validacao.js"></script>
        <script>
            
    </script>
        
        <title><?php echo $acaoPagina ?></title>
    </head>
    <body style="margin:0 !important;">
        <div class="carregando" id="carregando"></div>
        <div class="corpo" id="corpo">
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="especialidades.php">Especialidades</a></li>
                    <li><a href="cadastrarMedico.php"> Cadastrar Médico</a></li>
                    <li><a href="cadastrarEspecialidades.php">Cadastrar Especialidades</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <section>
               
                    <div class="div-25 cadastro">
                        <h1> <?php echo $acaoPagina ?> </h1>

                        <span id="resultado"></span>

                        <form class="formulario" name="frmcpf" action="dadosMedico.php" method="POST">
                            <label for="nome" generated="true" class="error"></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $Medico->getNome() ?>">
                            <label for="cpf" generated="true" class="error"></label>
                            <input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $Medico->getCpf() ?>">
                            <label for="nascimento" generated="true" class="error"></label>
                            <input type="text" name="nascimento" id="nascimento" value="<?php echo $Medico->getNascimento() ?>">
                            <label for="email" generated="true" class="error"></label>
                            <input type="email" name="email" placeholder="E-Mail" value="<?php echo $Medico->getEmail() ?>">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $Medico->getTelefone() ?>">
                            <input type="text" name="watshapp" id="whatswap" placeholder="WatsAapp" value="<?php echo $Medico->getWhatswapp() ?>">
                             <label for="crm" generated="true" class="error"></label>
                            <input type="text" name="crm" placeholder="CRM" value="<?php echo $Medico->getCrn() ?>">
                             <label for="salario" generated="true" class="error"></label>
                            <input type="text" name="salario" placeholder="Salário" id="salario" value="<?php echo $Medico->getMedia_salarial() ?>">
                             <label for="especialidade_medico" generated="true" class="error"></label>
                            <select name="especialidade_medico" >
                            <?php
                            if($Medico->getEspecialidade_nome()&& $Medico->getId_especialidade()):
                                echo"<option value='{$Medico->getId_especialidade()}'>{$Medico->getEspecialidade_nome()}</option>";
                            else:
                                echo"<option></option>";
                            endif;
                            $selectDados->dadosEpcialidade($Esp);
                            ?>
                        </select>

                            <input type="submit" value="<?php echo $submit ?>">

                        </form>

                    </div>
                
            </section>
        </main>
        
        <footer>
            
        </footer>
      </div>
    </body>
</html>
