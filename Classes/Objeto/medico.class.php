<?php

/**
 * Description of medico
 *
 * @author Júnior
 */
class medico extends especialidades{
    
    private $id_medico;
    private $nome;
    private $cpf;
    private $nascimento;
    private $email;
    private $telefone;
    private $whatswapp;
    private $media_salarial;
    private $crn;
    
    private $dados;
    protected $especialidade_medico;
    
    function __construct() {
        $this->dados = ['id'=>'id',
                        'cod'=>'cod',
                        'nome'=>'nome',
                        'cpf'=>'cpf',
                        'email'=>'email',
                        'telefone'=>'telefone',
                        'whatsapp'=> 'whatsapp',
                        'nascimento'=>'nascimento',
                        'especialidade'=>'especialidade',
                        'especialidade_medico'=>'especialidade_medico',
                        'crm'=>'crm',
                        'salario'=>'salario'
                        ];
    }
            
    function getId_medico() {
        return $this->id_medico;
    }

        
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getWhatswapp() {
        return $this->whatswapp;
    }

    function getMedia_salarial() {
        return $this->media_salarial;
    }

    function getCrn() {
        return $this->crn;
    }
    
    function getEspecialidade_medico() {
        return $this->especialidade_medico;
    }
    
    function getDados() {
        return $this->dados;
    }

            
    function setId_medico($id_medico) {
        $this->id_medico = (int) $id_medico;
    }

    
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setWhatswapp($whatswapp) {
        $this->whatswapp = $whatswapp;
    }

    function setMedia_salarial($media_salarial) {
        $this->media_salarial = (doubleval($media_salarial));
    }

    function setCrn($crn) {
        $this->crn = $crn;
    }
    
    function setEspecialidade_medico($especialidade_medico) {
        $this->especialidade_medico =(int) $especialidade_medico;
    }
    
    //public function medicoBanco(medico $medico)
    public function medicoBanco($Termos, $Tipo){
        
        $this->Tipo = $Tipo;
        $this->ExRead('medicos', $this->getDados(), $Termos, $this->Tipo);
    }

    public function Syntax() {
        
        if($this->Tipo=="dados_medico"):
            while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                $this->id_medico = $col['id'];
                $this->setId_especialidade($col['cod']);
                $this->nome = $col['nome'];
                $this->cpf = $col['cpf'];
                $this->nascimento = $col['nascimento'];
                $this->crn = $col['crm'];
                $this->email = $col['email'];
                $this->telefone = $col['telefone'];
                $this->whatswapp = $col['whatsapp'];
                $this->media_salarial = $col['salario'];
                $this->especialidade_medico = $col['especialidade_medico'];
                $this->setEspecialidade_nome($col['especialidade']);
            endwhile;
            
        elseif($this->Tipo=="lista_medico"):
            echo"<div class='lista-dados'>"
                    . "<h3>Médico:</h3>"
              . "</div>"
                
              . "<div class='lista-dados'>"
                    . "<h3>Especialidade:</h3>"
              . "</div>"
                
              . "<div class='botoes'>"
              . "</div>"
                
              . "<div class='botoes'>"
              . "</div>"
                
              . "<div style='clear:both;'></div>";
        
            while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                $this->id_medico = $col['id'];
                
                echo"<div class='lista-dados'>"
                    . "<p>" . $col['nome']. "</p>"
                  . "</div>"
                        
                  . "<div class='lista-dados'>"
                    . "<p>" .$this->nome = $col['especialidade']. "</p>"
                  . "</div>"
                        
                  . "<div class='botoes'>"
                        . "<form action='cadastrarMedico.php' method='POST'> "
                              . "<input type='hidden' name='medico' value={$this->getId_medico()}>"
                              . "<button type='submit'>Editar</button>"
                        . "</form>"
                    . "</div>"
                    
                  . "<div class='botoes'>"
                        . "<form action='deletaDados.php' method='POST'> "
                              . "<input type='hidden' name='deletar' value='medico'>"
                              . "<input type='hidden' name='deleta_medico' value={$this->getId_medico()}>"
                              . "<button type='submit'>Excluir</button>"
                        . "</form>"
                  . "</div>"
                 . "<div style='clear:both;'></div>";
            endwhile;
        endif;
        
        
    }



}
