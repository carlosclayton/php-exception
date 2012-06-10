<?php
class LerArquivo{
	private $arquivo	=	"nomes.txt";
	private $ponteiro;

	function __construct(){
		/*
		 * Checa se um arquivo existe
		 */
		if(file_exists($this->arquivo)){
			//Abre o arquivo somente para leitura
			$this->ponteiro	= fopen($this->arquivo, "r");
		}else {
			// Caso não exista é lançada uma exceção
			throw new Exception("O arquivo não existe!", 0025);
		}



	}
	/*
	 * Método GET para acessar o ponteiro
	 */

	function getPonteiro(){
		return $this->ponteiro;
	}
}


/*
 * Tratando o trecho do código que pode gerar uma exceção
 */
try{
	$arquivo	=	new LerArquivo();
	
	while (!feof($arquivo->getPonteiro())){
		// Lê uma linha de um ponteiro de arquivo
		echo fgets($arquivo->getPonteiro(), 4096) . "<br />";
	}
	
	// Fecha o arquivo
	fclose($arquivo->getPonteiro());
	
}catch (Exception $ex){
	// O . é usado para concatenar strings
	echo $ex->getCode() . ": " . $ex->getMessage();
}

















