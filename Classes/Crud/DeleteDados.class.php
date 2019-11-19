<?php

/**
 * Description of DeleteDados
 *
 * @author Júnior
 */
class DeleteDados {
   
    public function deleteEspecialidades(especialidades $Esp){
        
        $deleteEsp = new Delete();
        $deleteEsp->ExeDelete("especialidades", "WHERE cod = :id", 'id='.$Esp->getId_especialidade());
        
    }
    
    public function deleteMedico(medico $Medicos){
        
        $deleteEsp = new Delete();
        $deleteEsp->ExeDelete("medicos", "WHERE id = :id", 'id='.$Medicos->getId_medico());
        
    }
}
