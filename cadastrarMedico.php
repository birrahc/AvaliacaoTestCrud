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
        <script language="javascript">
            function VerificaCPF () {
            if (vercpf(document.frmcpf.cpf.value)) 
            {document.frmcpf.submit();}else 
            {errors="1";if (errors) alert('CPF NÃO VÁLIDO');
            document.retorno = (errors == '');}}
            function vercpf (cpf) 
            {if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
            return false;
            add = 0;
            for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
            rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
            return false;
            add = 0;
            for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
            rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
                return false;
            return true;}
        </script>
</head>
        
        <title><?php echo $acaoPagina ?></title>
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
                    <h1> <?php echo $acaoPagina ?> </h1>
                    <form name="frmcpf" action="dadosMedico.php" method="POST" onsubmit="VerificaCPF();">
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
                    
                       <input type="button" name="Submit" value="Cadastrar" onclick="VerificaCPF();">
                    
                    </form>
                    
                </div>
            </section>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>
