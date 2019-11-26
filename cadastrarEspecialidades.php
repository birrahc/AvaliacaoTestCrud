<!DOCTYPE html>
<?php
require('./Classes/config.inc.php');
$esp = new especialidades();
$selecionar = new SelectDados();

if(isset($_POST['cod'])):
    $esp->setId_especialidade($_POST['cod']); 
    $selecionar->dadosEsp($esp);
endif;

?>
<html lang="pt-br">
   <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Classes/css/estilo.css">
        <script type="text/javascript" src="js/validadCampos.js"></script>
        <title></title>
    </head>
    <body>
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
                    <h1> Cadastro de Especialidades </h1>
                    <form name="formEsp" action="dadoEspecialidades.php" method="POST" onsubmit="return validaCamposForm();">
                        <input type="hidden" name="cod" value="<?php echo $esp->getId_especialidade() ?>">
                        <input type="text" name="especialidade" placeholder="Especialidade" value="<?php echo $esp->getEspecialidade_nome() ?>">
                    <button type="submit">Cadastrar</button>
                    </form>
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
