<?php

 /* Description of Update
 *
 * @author Júnior
 */
class UpdateDados{
   
    public function updateEspecialidade(especialidades $esp) {
        
        $Dados =  ['especialidade'=>$esp->getEspecialidade_nome()];
        
        $updateEsp = new Update();
        $updateEsp->ExUpdate("especialidades", $Dados, "WHERE cod = :id", 'id='.$esp->getId_especialidade());
    }
    
    public function updateMedicoNome(medico $medico){
        
        $Dados = [  'id'=>$medico->getId_medico(),
                    'nome'=>$medico->getNome()
                ];
        
        $updateMed = new Update();
        $updateMed->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$medico->getId_medico());
    }
    
    public function updateMedicoCpf(medico $cpf){
        $Dados = [  'id'=>$cpf->getId_medico(),
                    'cpf'=>$cpf->getCpf()
                ];
        
        $updateMedCpf = new Update();
        $updateMedCpf->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$cpf->getId_medico());
    }
    
    public function updateMedicoEmail(medico $email){
        $Dados = [  'id'=>$email->getId_medico(),
                    'email'=>$email->getEmail()
                ];
        $updateMedEmail = new Update();
        $updateMedEmail->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$email->getId_medico());
    }
    
    public function updateMedicoCrm(medico $crm){
        $Dados = [  'id'=>$crm->getId_medico(),
                    'crm'=>$crm->getCrn(),
                ];
        
        $updateMedDados = new Update();
        $updateMedDados->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$crm->getId_medico());
    }
    
    public function updateDadosMedicos(medico $dados){
        $Dados = [  'id'=>$dados->getId_medico(),
                    'nome'=>$dados->getNome(),
                    'nascimento'=>$dados->getNascimento(),
                    'telefone'=>$dados->getTelefone(),
                    'whatsapp'=>$dados->getWhatswapp(),
                    'salario'=>$dados->getMedia_salarial(),
                    'especialidade_medico'=>$dados->getEspecialidade_medico()
                ];
        
        $updateMedDados = new Update();
        $updateMedDados->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$dados->getId_medico());
    }
}
