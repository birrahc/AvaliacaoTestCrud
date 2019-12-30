<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require ('./Classes/config.inc.php');
            $med = new medico();
            $cad = new Insert();
            
            $med->setNome("Fredolato Souza");
            $med->setCpf("05397913936");
            $med->setNascimento("1987-10-21");
            $med->setEmail("carline.gmail.com");
            $med->setTelefone("48991480381");
            $med->setWhatswapp("");
            $med->setCrn("440921");
            $med->setMedia_salarial(20000);
            $med->setEspecialidade_medico(9);
            
            $cad->CadastrarMedicos($med);
            var_dump($cad->CadastrarMedicos($med));
        ?>
    </body>
</html>
