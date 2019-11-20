<!DOCTYPE html>

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
                <div class="div-25 cadastro">
                    <h1> Cadastro de Especialidades </h1>
                    <form action="dadoEspecialidades.php" method="POST">
                    <input type="hidden" name="cod">
                    <input type="text" name="especialidade" placeholder="Especialidade">
                    <button type="submit">Cadastrar</button>
                    </form>
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
