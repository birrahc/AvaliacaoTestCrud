<!DOCTYPE html>
<?php   
    require('./Classes/config.inc.php');
    $Medico = new medico();
    $dadosMedico = new SelectDados();
    
    $Medico->setId_medico("");
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Classes/css/estilo.css">
        <title></title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="cadastrarMedico.php"> Cadastrar Médico</a></li>
                    <li><a href="cadastrarEspecialidades.php">Cadastrar Especialidades</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <div class="div-80">
                    <?php
                        $dadosMedico->listaMedicos($Medico);
                    ?>  
                </div>
            </section>
        </main>
    </body>
</html>
