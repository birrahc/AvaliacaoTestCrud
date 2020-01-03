
function init (){
    jQuery(function($){
        $("#nome").addClass("captalize"); 
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $("#nascimento").mask('00/00/0000',{placeholder: "Data de Nascimento"});
        $("#telefone").mask("(00) 0000-00-00", {placeholder: "Telefone"});
        $("#whatswap").mask("(00) 99999-99-99", {placeholder: "WhatsApp"});
        $("#salario").mask('000.000.000.000.000,00', {reverse: true});
        $("#crm").mask('000000', {reverse: true});
    });
    // validaçao do campo nome
    $("#formDados").validate({
        submitHandler: function(){
            
            var dados = $("#formDados").serialize();
            
             $.ajax({
                type: 'POST',
                url: 'dadosMedico.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#formConjunto").removeClass("loading-image");
                    $("#formConjunto").removeClass("checkOk");
                    $("#formConjunto").removeClass(".checkOkError");
                    $("#formConjunto").addClass("loading-image");
                    $("#formConjunto").fadeOut(4000);
                    
                    if(response >=1){
                        setTimeout(function(){
                         $("#formConjunto").addClass("checkOk").show();
                         $("#formConjunto").fadeIn();
                        },2000);
                    }else{
                        setTimeout(function(){
                            $("#formConjunto").removeClass("loading-image");
                             location.reload();
                        },3000);
                        
                        setTimeout(function(){
                         $("#formConjunto").addClass(".checkOkError").show();
                         $("#formConjunto").fadeIn();
                        },2000);
                    }
                    
                }
               
            });
             
            return false;
        },
        
       
        rules: {
            nome: { required: true, minlength:9 },
            nascimento: { required: true, verificaIdade: true,},
            email:{ email: true, verificaEmail: true},
            especialidade_medico:{required: true},
            salario:{required: true}
        },

        messages: {
            nome: { required: "Campo Nome Obrigatório ", minlength:"O Campo Nome deve ter no minimo 9 caractres"  },
            nascimento: { required: "Campo Nascimento Obrigatório" },
            email:{ email: "por favor preencha um email válido!"},
            especialidade_medico:{required:" Preencha o campo Especialidade"},
            salario:{ required: "Por favor preencha o campo Salario"}
        },
                    
    });
    
    //validacão do campo cpf
    $("#formCpf").validate({
        
        submitHandler: function(){
            
            var dados = $("#formCpf").serialize();
            
             $.ajax({
                type: 'POST',
                url: 'dadosMedico.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#procesCpf").removeClass("loading-image");
                    $("#procesCpf").removeClass("checkOk");
                    $("#procesCpf").removeClass(".checkOkError");
                    $("#procesCpf").addClass("loading-image");
                    $("#procesCpf").fadeOut(4000);
                    if(response >=1){
                        setTimeout(function(){
                         $("#procesCpf").addClass("checkOk").show();
                         $("#procesCpf").fadeIn();
                        },2000);
                    }else{
                        setTimeout(function(){
                            $("#procesCpf").removeClass("loading-image");
                             location.reload();
                        },3000);
                        
                        setTimeout(function(){
                         $("#procesCpf").addClass("checkOkError").show();
                         $("#procesCpf").fadeIn();
                        },2000);
                    }
                    
                }
               
            });
             
            return false;
        },
        
        rules:{
                cpf: { required: true, verificaCPF: true }
            },
        messages:{
                    cpf: { required: "Campo CPF Obrigatório" }
                }
                    
    });
    
    //validaçao de Email
    
    $("#formEmail").validate({
        submitHandler: function(){
            
            var dados = $("#formEmail").serialize();
            
             $.ajax({
                type: 'POST',
                url: 'dadosMedico.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#procesEmail").removeClass("loading-image");
                    $("#procesEmail").removeClass("checkOk");
                    $("#procesEmail").removeClass(".checkOkError");
                    $("#procesEmail").addClass("loading-image");
                    $("#procesEmail").fadeOut(4000);
                    if(response >=1){
                        setTimeout(function(){
                         $("#procesEmail").addClass("checkOk").show();
                         $("#procesEmail").fadeIn();
                        },2000);
                    }else{
                        setTimeout(function(){
                            $("#procesEmail").removeClass("loading-image");
                             location.reload();
                        },3000);
                        
                        setTimeout(function(){
                         $("#procesEmail").addClass("checkOkError").show();
                         $("#procesEmail").fadeIn();
                        },2000);
                    }
                    
                }
               
            });
             
            return false;
        },
        
        rules: {
                email:{ email: true, verificaEmail: true}
                },

        messages:{
                    email:{ email: "por favor preencha um email válido!"},
                }
                    
    });
    
    //valida CRM
    
    $("#formCrm").validate({
        
        submitHandler: function(){
            
            var dados = $("#formCrm").serialize();
            
             $.ajax({
                type: 'POST',
                url: 'dadosMedico.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#procesCrm").removeClass("loading-image");
                    $("#procesCrm").removeClass("checkOk");
                    $("#procesCrm").removeClass(".checkOkError");
                    $("#procesCrm").addClass("loading-image");
                    $("#procesCrm").fadeOut(4000);
                    if(response >=1){
                        setTimeout(function(){
                         $("#procesCrm").addClass("checkOk").show();
                         $("#procesCrm").fadeIn();
                        },2000);
                    }else{
                        setTimeout(function(){
                            $("#procesCrm").removeClass("loading-image");
                             location.reload();
                        },3000);
                        
                        setTimeout(function(){
                         $("#procesCrm").addClass("checkOkError").show();
                         $("#procesCrm").fadeIn();
                        },2000);
                    }
                    
                }
               
            });
             
            return false;
        },
        
        rules: {
            crm:{verificaCrm:true, minlength:6, maxlength:8}
        }        
});
   
}

jQuery.validator.addMethod("verificaCPF", function (value, element) {
    
    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
                
    while (cpf.length < 11) cpf = "0" + cpf;
    
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
                
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
        b = 0;
        c = 11;
        
    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
               
    var verifica=false;
                
    jQuery.ajax({
        url: 'checkDados.php?cpf='+cpf,
        async: false,
        success: function(data) {
        if(data == 0) verifica = true;
    }});
			
    if(!verifica) return false;
    
    return true;
}, "CPF inválido ou já cadastrado!");

jQuery.validator.addMethod("verificaEmail", function (value, element) {
    
    email= value;
                
    var verificaEmail=false;
                
    jQuery.ajax({
        url: 'checkDados.php?email='+email,
        async: false,
        success: function(data) {
        if(data == 0) verificaEmail = true; 
    }});
			
    if(!verificaEmail) return false;
                       
                          
                return true;
                
}, "Email já cadastrado!");

jQuery.validator.addMethod("verificaCrm", function (value, element) {
                crm= value;
                
                var verificaCrm=false;
                
                jQuery.ajax({
                            url: 'checkDados.php?crm='+crm,
                            async: false,
                            success: function(data) {
                               if(data == 0) verificaCrm = true; 
                           }});
			
                if(!verificaCrm) return false;
                       
                          
                return true;
                
   }, "crm já cadastrado!");
   
   jQuery.validator.addMethod("verificaIdade", function (value, element) {
                //$("#nascimento").mask('00/00/0000',{placeholder: "__/__/____"});
                var data = new Date();
                value = value.split("/");
                nascimento = value;
                var anos = data.getFullYear() - nascimento[2];
                if (nascimento[1] > data.getMonth()) {
                    anos -= 1;
                } else if (nascimento[1] == data.getMonth()) {
                    if (nascimento[0] > data.getDate()) {
                        anos -= 1;
                    }
                }

                if (anos <= 22) {
                    return false;
                }
                return true;
            },
                "A idade não pode ser menor que 22 anos ");


$(document).ready(init);

