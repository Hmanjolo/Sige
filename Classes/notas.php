<?php
class notas {
    private $idNota;
    private $T1;
    private $T2;
    private $T3;
    private $Trab1;
    private $Trab2;
    public  $idEstudante;
    public  $disciplina;
    public  $trimestre;
    private $servidor="localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "sgm";

    function __construct($servidor, $usuario, $senha, $db) {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->db = $db;
    }

    //Conexao
    public function Conexao() {
        $conn = mysqli_connect($servidor, $usuario, $senha, $db);
    }
    
    //Getters
    function getIdEstudante() {
        return $this->idEstudante;
    }

    function getDisciplina() {
        return $this->disciplina;
    }

    function getTrimestre() {
        return $this->trimestre;
    }
    function getIdNota() {
        return $this->idNota;
    }

        function getT1() {
        return $this->T1;
    }

    function getT2() {
        return $this->T2;
    }

    function getT3() {
        return $this->T3;
    }

    function getTrab1() {
        return $this->Trab1;
    }

    function getTrab2() {
        return $this->Trab2;
    }
    
    //Setters
    function setIdNota($idNota) {
        $this->idNota = $idNota;
    }

    function setT1($T1) {
        $this->T1 = $T1;
    }

    function setT2($T2) {
        $this->T2 = $T2;
    }

    function setT3($T3) {
        $this->T3 = $T3;
    }

    function setTrab1($Trab1) {
        $this->Trab1 = $Trab1;
    }

    function setTrab2($Trab2) {
        $this->Trab2 = $Trab2;
    }
    
    function setIdEstudante($idEstudante) {
        $this->idEstudante = $idEstudante;
    }

    function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    function setTrimestre($trimestre) {
        $this->trimestre = $trimestre;
    }
    
    public function inserir() {
        $sql = "INSERT INTO `tabela_notas` (`idEstudante`, `Teste1`, `Teste2`, `Teste3`, `Trab1`, `Trab2`, `disciplina`, `trimestre`, `DataCadastro`) VALUES ('$this->getIdEstudante()', '$this->getT1()', '$this->getT2()', '$this->getT3()', '$this->getTrab1()', ''$this->getTrab2(), '$this->getDisciplina()', '$this->getTrimestre()', 'Now()')";
        
if($conn->query($sql) === TRUE){
	
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
    }
}
