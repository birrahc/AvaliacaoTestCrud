<!DOCTYPE html>
<?php
require('./Classes/config.inc.php');

$Medico = new medico();
$Esp = new especialidades();

$selectDados = new SelectDados();

$acaoPagina = "Cadastrar Médico";

$submit="Cadastrar";

if(isset($_POST['medico'])):
    $Medico->setId_medico($_POST['medico']);
    $selectDados->dadosMedicos($Medico);
    
endif;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/validaUpadte.js"></script>
        <title></title>
    </head>
    <body style="margin:0 !important;">
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
                <div class="div-25 cadastro pagEditar">
                    <h1> Editar Dados Médico </h1>
                    
                    <span id="resultado"></span>
                    
                    <div class="form-2">
                        <form id="formDados" action="dadosMedico.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $Medico->getId_medico() ?>">
                            <input type="hidden" name="acao" value="1">
                            <label for="nome" generated="true" class="error"></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $Medico->getNome() ?>">
                            <label for="nascimento" generated="true" class="error"></label>
                            <input type="text" name="nascimento" id="nascimento" value="<?php echo  date("d/m/Y", strtotime($Medico->getNascimento()))?>">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $Medico->getTelefone() ?>">
                            <input type="text" name="watshapp" id="whatswap" placeholder="Watshapp" value="<?php echo $Medico->getWhatswapp() ?>">
                            <label for="salario" generated="true" class="error"></label>
                            <input type="text" name="salario" id="salario" placeholder="Salário" value="<?php echo $Medico->getMedia_salarial() ?>">
                            <label for="especialidade_medico" generated="true" class="error"></label>
                            <select name="especialidade_medico" >
                            <?php
                            if($Medico->getEspecialidade_nome()&& $Medico->getId_especialidade()):
                                echo"<option value='{$Medico->getId_especialidade()}'>{$Medico->getEspecialidade_nome()}</option>";
                            else:
                                echo"<option>Especialidade</option>";
                            endif;
                            $selectDados->dadosEpcialidade($Esp);
                            ?>
                        </select>

                            <input type="submit" value="Editar">
                        </form>
                    </div>
                    
                    <div class="form-1">
                        
                        <form id="formCpf" action="dadosMedico.php" method="POST">
                             <input type="hidden" name="id" value="<?php echo $Medico->getId_medico() ?>">
                             <label for="cpf" generated="true" class="error"></label>
                             <input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $Medico->getCpf() ?>">
                             <span class="update" id="updateNome"></span>
                            <input type="submit" value="Editar">
                        </form>

                        <form id="formEmail" action="dadosMedico.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $Medico->getId_medico() ?>">
                            <label for="email" generated="true" class="error"></label>
                            <input type="email" name="email" placeholder="E-Mail" value="<?php echo $Medico->getEmail() ?>">
                            <input type="submit" value="Editar">
                        </form>

                        <form id="formCrm" action="dadosMedico.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $Medico->getId_medico() ?>">
                            <label for="crm" generated="true" class="error"></label>
                            <input type="text" name="crm" id="crm" placeholder="CRM" value="<?php echo $Medico->getCrn() ?>">
                            <input type="submit" value="Editar">
                        </form>
                    </div>
                    
                    
                </div>
                <div class="processo-Campo" id="formConjunto"> </div>
                
                <div class="processo">
                    <div class="processamento " id="procesCpf"></div>
                    <div class="processamento " id="procesEmail"></div>
                    <div class="processamento " id="procesCrm"></div>
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
