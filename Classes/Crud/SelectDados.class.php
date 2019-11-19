<?php

/**
 * Description of SelectDados
 *
 * @author Júnior
 */
class SelectDados {
    
    public function listaMedicos(medico $medico){
        $Termos2 = " inner join especialidades e on especialidade_medico = e.cod"
                 . " where nome like '{$medico->getNome()}%' "
                 . "ORDER BY nome ";
        $medico->medicoBanco($Termos2, "lista_medico");
    }
    
     public function dadosMedicos(medico $medico){
        $Termos2 = " inner join especialidades e on especialidade_medico = e.cod"
                 . " where id ={$medico->getId_medico()}";
        $medico->medicoBanco($Termos2, "dados_medico");
    }
    
    public function dadosEpcialidade(especialidades $Esp){
        $Termos2 = " ";
        $Esp->especialidadeBanco($Termos2, "selectEsp");
    }
    
}
