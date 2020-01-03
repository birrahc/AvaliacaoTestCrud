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
    
    private $VerificaDadosEsp;
    
    private $data;
    
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
    
    function getVerificaDadosEsp() {
        return $this->VerificaDadosEsp;
    }
    
    function getData() {
        return $this->data;
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
        if($this->Tipo=="dados_Esp"):
            
            while($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                $this->VerificaDadosEsp = true;
                $this->id_especialidade = $col['cod'];
                $this->especialidade_nome = $col['especialidade'];
            endwhile;
    
    elseif($this->Tipo == "VerificaDado"):
            
            $col = $this->Read->fetch(PDO::FETCH_ASSOC);
            if($this->Read->rowCount()>0):
                $this->data= $this->Read->rowCount();
            
            else:
                $this->data=0;
            endif;
            
            echo $this->getData();
            
        elseif($this->Tipo=="selectEsp"):
            
            while($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                $this->id_especialidade = $col['cod'];
                $this->especialidade_nome = $col['especialidade'];
                echo"<option value = {$this->getId_especialidade()}>{$this->getEspecialidade_nome()}</option>";
            endwhile;
            
        elseif($this->Tipo=="lista_Especialidades"):
            
            echo"<div class='list-cod color-withsmoke'>"
                . "<h3> Cod</h3>"
              . "</div>"
                
              . "<div class='list-esp color-withsmoke'>"
                . "<h3> Especialidades</h3>"
              . "</div>"
                
              . "<div class='botoes div-acoes'>"
                . "<h3>Ações</h3>"
              . "</div>" 
              . "<div style='clear:both;'></div>";
        
            while($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                
                $this->id_especialidade = $col['cod'];
                $this->especialidade_nome = $col['especialidade'];
                
                echo"<div class='list-cod'> <p> {$this->getId_especialidade()} </p> </div>"
                  . "<div class='list-esp'> <p> {$this->getEspecialidade_nome()} </p> </div>"
                  . "<div class='botoes'>"
                        . "<form action='especialidades.php' method='POST'>"
                            . "<input type='hidden' name='espEsp' value='{$this->getId_especialidade()}'>"
                            . "<button type='submit'>Edit/Del</button/>"
                        . "</form>"
                  . "</div>";
            endwhile;
            
        endif;
    }

}
