<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especialidades
 *
 * @author Birra
 */
class especialidades extends Select{
    private $id_especialidade;
    private $especialidade_nome;
    
    private $dadosEsp;
    
    function __construct() {
        $this->dadosEsp = ['cod'=>'cod',
                           'especialidade'=>'especialidade'
                          ];
        
    }
            function getId_especialidade() {
        return $this->id_especialidade;
    }

    function getEspecialidade_nome() {
        return $this->especialidade_nome;
    }

    function setId_especialidade($id_especialidade) {
        $this->id_especialidade = $id_especialidade;
    }

    function setEspecialidade_nome($especialidade_nome) {
        $this->especialidade_nome = $especialidade_nome;
    }
    
    public function especialidadeBanco($Termos, $Tipo){
        $this->Tipo=$Tipo;
        $this->ExRead('especialidades', $this->dadosEsp, $Termos, $this->Tipo);
    }

    public function Syntax() {
        if($this->Tipo=="selectEsp"):
            
            while($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                $this->id_especialidade = $col['cod'];
                $this->especialidade_nome = $col['especialidade'];
                echo"<option value = {$this->getId_especialidade()}>{$this->getEspecialidade_nome()}</option>";
            endwhile;
            
        elseif($this->Tipo=="lista_Especialidades"):
            
            echo"<div class='list-esp'>Especialidades</div>"
              . "<div class='botoes'></div>"
              . "<div class='botoes'></div>";
        
            while($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                
                $this->id_especialidade = $col['cod'];
                $this->especialidade_nome = $col['especialidade'];
                
                echo"<div class='list-esp'>{{$this->getEspecialidade_nome()}</div>"
                  . "<div class='botoes'>"
                        . "<input type='hidden' name='editar_esp' value='{$this->getId_especialidade()}'>"
                        . "<button type='submit'>Editar</button/>"
                  . "</div>"
                                
                  . "<div class='botoes'>"
                        . "<input type='hidden' name='excluir_esp' value='{$this->getId_especialidade()}'>"
                        . "<button type='submit'>Excluir</button/>"
                  . "</div>";
            endwhile;
            
        endif;
    }

}
