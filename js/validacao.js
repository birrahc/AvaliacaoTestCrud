
function init() {
    
    $("#carregando").hide();
    $("#corpo").show();
    
    jQuery(function($){
        $("#nome").addClass("captalize"); 
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $("#nascimento").mask('00/00/0000',{placeholder: "Data de Nascimento"});
        $("#telefone").mask("(00) 0000-00-00", {placeholder: "Telefone"});
        $("#whatswap").mask("(00) 99999-99-99", {placeholder: "WhatsApp"});
        $("#salario").mask('000.000.000.000.000,00', {reverse: true});
    });
    //=========================++++++=============================
    //====== Validando Formulario de cadastro de Médico ==========
    //============================================================
    $(".formulario").validate({
        
        submitHandler: function(){
            var dados = $(".formulario").serialize();
             $.ajax({
                type: 'POST',
                url: 'dadosMedico.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#carregando").show();
                    $("#carregando").fadeOut(4000);
                     
                    if(response >=1){
                       
                        setTimeout(function(){
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Dados Cadastrados com Sucesso!',
                                showConfirmButton: false,
                                timer: 47000
                            });
                        
                        },3000);
                        
                        setTimeout(function(){
                        location.href="index.php";
                        },5000);
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro...',
                            text: 'Não Foi Possivel Cadastrar!',
                            footer: '<a href>Why do I have this issue?</a>'
                          })
                          location.reload();
                    }
                    
                }
               
            });
             
            return false;
        
        },
        rules: {
            nome: { required: true, minlength:9 },
            cpf: { required: true, verificaCPF: true },
            crm:{verificaCrm:true},
            nascimento: { required: true, verificaIdade: true,},
            email:{ email: true, verificaEmail: true},
            especialidade_medico:{required: true},
            salario:{required: true}
        },

        messages: {
            nome: { required: "Campo Nome Obrigatório ", minlength:"O Campo Nome deve ter no minimo 9 caractres" },
            cpf: { required: "Campo CPF Obrigatório" },
            nascimento: { required: "Campo Nascimento Obrigatório" },
            email:{ email: "por favor preencha um email válido!"},
            especialidade_medico:{required:" Preencha o campo Especialidade"},
            salario:{ required: "Por favor preencha o campo Salario"}
        },
                    
    });
     //================== +++++ ======================           
    //======= validando cadastro Especialidades ======
    //=================== +++++ ======================
    $("#formEsp").validate({
        
        submitHandler: function(){
            var dados = $("#formEsp").serialize();
             $.ajax({
                type: 'POST',
                url: 'dadoEspecialidades.php',
                async: false,
                data: dados,
                success: function(response) {
                    $("#carregando").show();
                    $("#carregando").fadeOut(4000);
                     
                    if(response >=1){
                       
                        setTimeout(function(){
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Dados Cadastrados com Sucesso!',
                                showConfirmButton: false,
                                timer: 47000
                            });
                        
                        },3000);
                        
                        setTimeout(function(){
                            location.href="especialidades.php";
                        },5000);
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro...',
                            text: 'Não Foi Possivel Cadastrar!',
                            footer: '<a href>Why do I have this issue?</a>'
                          })
                    }
                    
                }
               
            });
             
            return false;
        },
        rules: {
            especialidade: { required: true, verificaEspecialidade: true, minlength:6}
        },

        messages: {
            especialidade: { required: "Campo Nome Obrigatório ", minlength:"O campo deve ter no minimo 6 caracteres" }
        }
                    
    });
    
    //Deleta Medico
    $("#deleteMed").validate({
        submitHandler: function(){
            var dados = $("#deleteMed").serialize();
            var crm =  $("#crm_med").val().valueOf();
            if(crm){
                Swal.fire({
                    icon: 'error',
                    title: 'Médico com CRM Registrado.',
                    text: 'Não é permitido deletar dados!'
                });
                
            }else{
            
                Swal.fire({
                    title: 'Deseja realmente deletar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'deletaDados.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    if(response >=1){

                                        setTimeout(function(){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados deletados com Sucesso!',
                                                showConfirmButton: false,
                                                timer: 47000
                                            });

                                        },3000);

                                        setTimeout(function(){
                                            location.href="index.php";
                                        },5000);
                                    }else{
                                        setTimeout(function(){
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Não foi possivel delatar dados.'
                                            });

                                        },3000);

                                    }

                                }

                            });
                        }
                    });


                return false;
            
            }
        }
    });
    
    //Deleta Especialidade
    $("#espDel").validate({
        submitHandler: function(){
            var dados = $("#espDel").serialize();
                Swal.fire({
                    title: 'Deseja realmente deletar esses dados ?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: 'deletaDados.php',
                                async: false,
                                data: dados,
                                success: function(response) {
                                    $("#carregando").show();
                                    $("#carregando").fadeOut(4000);
                                    if(response >=1){

                                        setTimeout(function(){
                                            Swal.fire({
                                                position: 'top',
                                                icon: 'success',
                                                title: 'Dados deletados com Sucesso!',
                                                showConfirmButton: false,
                                                timer: 47000
                                            });

                                        },3000);

                                        setTimeout(function(){
                                            location.href="especialidades.php";
                                        },5000);
                                    }else{
                                        setTimeout(function(){
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Médico com esta especialidade.',
                                            text: 'Não é permitido deletar estes dados pois existe medico com este cadastro!'
                                            });

                                        },3000);

                                    }

                                }

                            });
                        }
                    });


                return false;
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
            
            
jQuery.validator.addMethod("verificaEspecialidade", function (value, element) {
               especialidade = value;
                
                var verificaEsp=false;
                
                jQuery.ajax({
                            url: 'checkDados.php?especialidade='+especialidade,
                            async: false,
                            success: function(data) {
                                //alert(data);
                               if(data == 0) verificaEsp = true; 
                           }});
			
                if(!verificaEsp) return false;
                       
                          
                return true;
                
            }, "Especialidade já cadastrada!");
                
            $(document).ready(init);