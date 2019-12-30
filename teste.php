
       <?php
#Verifica se tem um email para pesquisa
       //$emailPostado = "jrcjuniorcesar@gmil.com";
if(isset($_GET['cpf'])){ 

    #Recebe o Email Postado
    $emailPostado = $_GET['cpf'];
    
    #Conecta banco de dados 
    $con = mysqli_connect("localhost", "root", "", "crud");
    
    $sql = mysqli_query($con, "SELECT * FROM medicos where cpf ='{$emailPostado}'") or print mysqli_errno($con);

    #Se o retorno for maior do que zero, diz que já existe um.
    $valor;
    if(($sql) AND ($sql->num_rows != 0)){
        while($linha= mysqli_fetch_assoc($sql)){
            $valor = $sql->num_rows;
        }
        
    }else{ 
        $valor = 0;
        
    }
    
    echo $valor;
}
?>
   