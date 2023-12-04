<?php
	
	 class ConexaoBancoRandom
    {
    	private $servername;
    	private $database;
    	private $username;
    	private $password;
    	private $conexao;

    	function __construct()
    	{
    		//parâmetros de conexão
    		$this->servername="localhost";
    		$this->database="mensagemRandom";
    		$this->username="root";
    		$this->password="";

    		$this->conexao = new mysqli($this->servername,
    		                            $this->username,
    		                            $this->password,
    		                            $this->database);

    		if ($this->conexao->connect_errno){
    			die("Falha na conexão: ".$this->conexao->connect_error);
    		}
    	}

    	function __destruct(){
    		$this->conexao->close();
    	}

    	function query($qry) {
    		$rs = $this->conexao->query($qry);

    		return $rs;
    	}
    }
	

?>