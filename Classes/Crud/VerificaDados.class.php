<?php

/**
 * Description of VerificaDados
 *
 * @author Júnior
 */
class VerificaDados {
    public function verificaNome(medico $verifica){
        $Termos = "inner join especialidades e on especialidade_medico = e.cod"
                 ." WHERE nome = '{$verifica->getNome()}'";
        $verifica->medicoBanco($Termos, "dados_medico");
        return $verifica->getVerificaDados();
    }
    
    public function verificaCpf(medico $verifica){
        $Termos = "inner join especialidades e on especialidade_medico = e.cod"
                 ." WHERE cpf = '{$verifica->getCpf()}'";
        $verifica->medicoBanco($Termos, "dados_medico");
        return $verifica->getVerificaDados();
    }
    
    public function verificaEmail(medico $verifica){
        $Termos = "inner join especialidades e on especialidade_medico = e.cod"
                 ." WHERE email = '{$verifica->getEmail()}'";
        $verifica->medicoBanco($Termos, "dados_medico");
        return $verifica->getVerificaDados();
    }
    
    public function verificaCrm(medico $verifica){
        $Termos = "inner join especialidades e on especialidade_medico = e.cod"
                 ." WHERE crm = '{$verifica->getCrn()}'";
        $verifica->medicoBanco($Termos, "dados_medico");
        return $verifica->getVerificaDados();
    }
    
    public function verificaEspecialidade(especialidades $Esp){
        $Termos = " WHERE especialidade = '{$Esp->getEspecialidade_nome()}'";
        $Esp->especialidadeBanco($Termos, "dados_Esp");
        return $Esp->getVerificaDadosEsp();
    }
    
}
