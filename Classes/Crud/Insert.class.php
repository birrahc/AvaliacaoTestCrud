<?php
/**
 * Description of Insert
 *
 * @author Júnior
 */
class Insert{

    public function inserirEspecialidades(especialidades $especialidades) {
         
        $Dados = ['cod'=>$especialidades->getId_especialidade(),
                  'especialidade'=>$especialidades->getEspecialidade_nome()
                ];
        
        $inseririEsp = new InsercaoBanco();
        $inseririEsp->ExecutInserir("especialidades", $Dados);
                
        
    }
    
    public function CadastrarMedicos(medico $medico) {
        
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
        
        $inserirMedico = new InsercaoBanco();
        $inserirMedico->ExecutInserir("medicos", $Dados);
        
    }
}
