/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validaCamposForm(){
    if(document.formEsp.especialidade.value==""){
        alert("Por favor preencha o campo Corretamente");
        document.formEsp.especialidade.focus();
        return false;
	}
        
    if(document.formEsp.especialidade.value.length < 6 ){
        alert("O Campo não pode ter menos que 6 caracteres");
        document.formEsp.especialidade.focus();
        return false;
    }
    
    if(document.deleteMed.crm_med.value !=""){
        alert("O Médico Possui CRM Cadastrado, por tanto não pode ser excluido");
        document.deleteMed.crm_med.focus();
        return false;
    }
}

function camposMedico(){
    
    if(verificaNome(document.frmcpf.nome.value)){
        
        if (vercpf(document.frmcpf.cpf.value)){
            
            if(verNasc(document.frmcpf.nascimento.value)){
                document.frmcpf.submit();
            }else{
                alert("Por favor preencha a data de nascimento corretamente");
                document.frmcpf.nascimento.focus();
                return false;
            }
            
        }else{
            errors="1";if (errors) alert('CPF NÃO VÁLIDO');
            return false;
            document.retorno = (errors == '');
        }
        //document.frmcpf.submit();
        
    }else{
        alert("Por favor preencha o campo Nome Corretamente! No mininimo 8 caracteres");
        document.frmcpf.nome.focus();
        return false;
    }
    
   
}
        
function verificaNome(nome){
    
    if(nome.length < 8){
        //alert("O campo Nome não pode ter menos de 8 caracteres");
        document.frmcpf.nome.focus();
        return false;
    }  
    return true;
}

function vercpf(cpf){
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
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
            return true;
}

function idade(nasc) {
    var data = new Date();
    //var nascimento = '1984-03-14';
    var diaMesAno = nasc.split("-")
    var anos = data.getFullYear() - diaMesAno[0];
    if (diaMesAno[1] > data.getMonth()) {
        anos -= 1;
    } else if (diaMesAno[1] == data.getMonth()) {
        if (diaMesAno[2] > data.getDate()) {
            anos -= 1;
        }
    }

    return anos;
}



function verNasc(nascimento){
    if(nascimento ==""){
        return false;
    }else{
        if(idade(nascimento) <= 20){
            alert(`IDADE ${idade(nascimento)}!! A Idade não pode ser menor ou igual 20 anos!!!`);
            document.frmcpf.nascimento.focus();
            return false;
        }
    }
    return true;
}


        
    
            
        



