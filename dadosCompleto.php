<!DOCTYPE html>
<?php
    require ('./Classes/config.inc.php');
    
    if(isset($_POST['id_medico'])):
       $Med = new medico();
       $Med->setId_medico($_POST['id_medico']);
       $dadosMed = new SelectDados();
       $dadosMed->dadosMedicos($Med);
    else:
       header('Location: index.php');
    endif;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
         <link rel="stylesheet" href="css/sweetalert2.min.css">
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/sweetalert2.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/validacao.js"></script>
        <title>Dados Pessoais</title>
    </head>
    <body>
        <div class="carregando" id="carregando"></div>
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
                <div class="div-70" style="box-shadow: 5px 10px 18px #D3D3D3;">
                    <div class="div-98 h-center"><h2>Dados Cadastrais</h2></div>
                    <div class="div-98">
                        
                        <div class="d-pessoais" style="width: 40% !important">
                            <h4>Nome:</h4>
                            <div class="dadosPessoais"> <p><?php echo $Med->getNome()?></p></div>
                        </div>
                        
                        <div class="d-pessoais">
                            <h4>Nascimento:</h4>
                            <div class="dadosPessoais"><p><?php echo date('d/m/Y', strtotime($Med->getNascimento())) ?></p></div>
                        </div>
                        
                         <div class="d-pessoais">
                            <h4>CPF:</h4>
                            <div class="dadosPessoais"> <p><?php echo $Med->getCpf() ?></p></div>
                        </div>
                        
                        <div style="clear:both; border:solid 2px #D3D3D3; height: 20px; margin-top: 10px;"></div>
                        
                        <div class="d-pessoais" style="width: 40% !important">
                            <h4>E-Mail:</h4>
                            <div class="dadosPessoais"> <p><?php echo $Med->getEmail() ?></p></div>
                        </div>
                        
                        <div class="d-pessoais">
                            <h4>Telefone:</h4>
                            <div class="dadosPessoais"><p> <?php echo $Med->getTelefone() ?></p></div>
                        </div>
                        
                         <div class="d-pessoais">
                            <h4>WhatsApp:</h4>
                            <div class="dadosPessoais"> <p><?php echo $Med->getWhatswapp() ?></p></div>
                        </div>
                       
                         <div style="clear:both; border:solid 2px #D3D3D3; height: 20px; margin-top: 10px;"></div>
                        
                        <div class="d-pessoais" style="width: 40% !important">
                            <h4>Especialidade:</h4>
                            <div class="dadosPessoais"> <p><?php echo $Med->getEspecialidade_nome() ?></p></div>
                        </div>
                        
                        <div class="d-pessoais">
                            <h4>CRM:</h4>
                            <div class="dadosPessoais"><p id="crmDados"> <?php echo $Med->getCrn() ?></p></div>
                        </div>
                        
                         <div class="d-pessoais">
                            <h4>Salario:</h4>
                            <div class="dadosPessoais"> <p><?php echo number_format($Med->getMedia_salarial(), 2, ',', '.'); ?></p></div>
                        </div>
                       
                        <div style="clear:both"></div>
                    </div>
                    <div class="buttons">
                            <form id="deleteMed" action="deletaDados.php" method="POST">
                                <input type="hidden" name="deletar" value="medico">
                                <input id="deleta_medico" type="hidden" name="deleta_medico" value="<?php echo $Med->getId_medico() ?>">
                                <input type='hidden' id='crm_med' name='crm_med' value="<?php echo $Med->getCrn() ?>">
                                <button type="submit"> Deletar</button>
                            </form>
                        </div>
                        <div class="buttons">
                             <form action="atualizaMedico.php" method="POST">
                                <input type="hidden" id="" name='medico' value="<?php echo $Med->getId_medico() ?>">
                                <button type="submit">Editar</button>
                            </form>
                        </div>
                    
                    <div style="clear: both;"></div>
                </div>
            </section>
        </main>
        
    </body>
</html>
