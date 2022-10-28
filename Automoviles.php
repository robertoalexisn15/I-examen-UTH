<?php


class Automoviles
{

	//Coneexion 

	private $conn;
	private $tablename = "automoviles";

	public $Placa;
	public $Modelo;
	public $ID_Propietario;
	public $Nombre_Propietario;
	public $Fecha_Nac;
	public $Sexo;
    public $Tipo_Propietario;
    public $Departamento;

    // Constructor de Clase
    
    public function __construct($db)
    {
    	$this->conn = $db;
    }

    // Crear un empleados
        public function createAutos(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    Placa = :Placa, 
                    Modelo = :Modelo, 
                    ID_Propietario = :ID_Propietario, 
                    Nombre_Propietario = :Nombre_Propietario, 
                    Fecha_Nac = :Fecha_Nac,
                    Sexo = :Sexo, 
                    Tipo_Propietario = :Tipo_Propietario, 
                    Departamento = :Departamento";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->Placa=htmlspecialchars(strip_tags($this->Placa));
            $this->Modelo=htmlspecialchars(strip_tags($this->Modelo));
            $this->ID_Propietario=htmlspecialchars(strip_tags($this->ID_Propietario));
            $this->Nombre_Propietario=htmlspecialchars(strip_tags($this->Nombre_Propietario));
            $this->Fecha_Nac=htmlspecialchars(strip_tags($this->Fecha_Nac));
            $this->Sexo=htmlspecialchars(strip_tags($this->Sexo));
            $this->Tipo_Propietario=htmlspecialchars(strip_tags($this->Tipo_Propietario));
            $this->Departamento=htmlspecialchars(strip_tags($this->Departamento));
          
        
            // bind data
            $stmt->bindParam(":Placa", $this->Placa);
            $stmt->bindParam(":Modelo", $this->Modelo);
            $stmt->bindParam(":ID_Propietario", $this->ID_Propietario);
            $stmt->bindParam(":Nombre_Propietario", $this->Nombre_Propietario);
            $stmt->bindParam(":Fecha_Nac", $this->Fecha_Nac);
            $stmt->bindParam(":Sexo", $this->Sexo);
            $stmt->bindParam(":Tipo_Propietario", $this->Tipo_Propietario);
            $stmt->bindParam(":Departamento", $this->Departamento);
           
        
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }



}

?>