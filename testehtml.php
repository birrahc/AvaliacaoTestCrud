<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery-3.4.1.min.js"></script>
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
        <title></title>
    </head>
    <body>
        

<div id='resposta'></div>
<span id="resultado"></span>
        <script language="javascript">
           /*$(document).ready(function(){
               var cpf = "05397913936";
               var mensagem="Falso";
               $.get('teste.php?cpf='+cpf, function(conteudo){
                   //$("#resultado").html(conteudo);
                   if(conteudo > 0 ){
                       mensagem="verdadeiro";
                   }
               });*/
               var cpf = "05397913936";
               //$("#resultado").html(mensagem);
               jQuery.ajax({
                            url: 'teste.php?cpf='+cpf,
                            async: false,
                            success: function(data) {
                                ("#resultado").html(data);
                                if(data == 0) mensagem="verdadeiro";
                                    //$("#resultado").html(mensagem);
				}});
			 ("#resultado").html(data);
			if(!verifica) return false;
        </script>
    </body>
</html>
