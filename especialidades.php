<!DOCTYPE html>
<?php
    require('./Classes/config.inc.php');
    $esp = new especialidades();
    $Seleciona = new SelectDados();
    if(isset($_POST['espEsp'])):
        $esp->setId_especialidade($_POST['espEsp']);
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
        <title></title>
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
                    <?php
                        $Seleciona->listaEspecialidades($esp);
                        if(isset($_POST['espEsp'])):
                            echo"<div class='edit-del'>"
                                    . "<form id='espDel' action='deletaDados.php' method='POST'>"
                                        . "<input type='hidden' id='deletar' name='deletar' value='especialidade'>"
                                        . "<input type='hidden' id='excluir_esp' name='excluir_esp' value='{$esp->getId_especialidade()}'>"
                                        . "<button type='submit'>Excluir</button/>" 
                                    . "</form>"
                              . "</div>"
                                                
                              . "<div class='edit-del'>"
                                    . "<form action='cadastrarEspecialidades.php' method='POST'>"
                                        . "<input type='hidden' name='cod' value='{$esp->getId_especialidade()}'>"
                                        . "<button type='submit'>Editar</button/>"
                                    . "</form>"
                              . " </div>"
                                                
                              . "<div class='edit-del'>"
                                    . "<form action='especialidades.php' method='POST'>"
                                        . "<button type='submit'>voltar</button/>"
                                    . "</form>"
                              . "</div>";
                        endif;
                    ?>
                     <div style="clear: both;"></div>
                </div>
            </section>
        </main>
    </body>
</html>
