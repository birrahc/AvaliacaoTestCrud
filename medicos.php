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
