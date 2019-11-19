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
    
    public function updateMedico(medico $medico){
        
        $Dados = [
                    'nome'=>$medico->getNome(),
                    'nascimento'=>$medico->getNascimento(),
                    'cpf'=>$medico->getCpf(),
                    'crm'=>$medico->getCrn(),
                    'email'=>$medico->getEmail(),
                    'telefone'=>$medico->getTelefone(),
                    'whatsapp'=>$medico->getWhatswapp(),
                    'salario'=>$medico->getMedia_salarial(),
                    'especialidade_medico'=>$medico->getEspecialidade_medico()
                ];
        
        $updateMed = new Update();
        $updateMed->ExUpdate("medicos", $Dados, "WHERE id = :id", 'id='.$medico->getId_medico());
    }
}
