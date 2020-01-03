<!DOCTYPE html>
<?php
require('./Classes/config.inc.php');
$esp = new especialidades();
$selecionar = new SelectDados();

$pagina ="Cadastro de Especialidades";
$botao ="Cadastrar";

if(isset($_POST['cod'])):
    $esp->setId_especialidade($_POST['cod']); 
    $selecionar->dadosEsp($esp);
    $pagina ="Editar Especialidade";
    $botao="Editar";
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
                <div class="div-25 cadastro">
                    <h1><?php echo $pagina ?> </h1>
                    <form id="formEsp" name="formEsp" action="dadoEspecialidades.php" method="POST">
                        <input type="hidden" name="cod" value="<?php echo $esp->getId_especialidade() ?>">
                        <label for="especialidade" generated="true" class="error"></label>
                        <input type="text" name="especialidade" id="especialidade" placeholder="Especialidade" value="<?php echo $esp->getEspecialidade_nome() ?>">
                        <input type="submit" value="<?php echo $botao ?>">
                    </form>
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
