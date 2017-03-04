<?php
class Contato extends Controller
{
	public function index()
	{
		$this->loadView('contato/index');	
	}
	
	
	public function mensagem(){
		$info =array();
		
		if(isset($_POST['salvar']) && $_POST['salvar'] == 'Enviar')
		{
			//submit
			
			$dados = array();
			$dados['nome'] = $_POST['nome'];
			$dados['email'] = $_POST['email'];
			$dados['mensagem'] = $_POST['mensagem'];
			
			//enviar mensagem
			if( self::Enviar($dados) ){
				$info['resultado'] = 'Sucesso';
			}else{
				$info['resultado'] = 'Falha';
			}
			
		}
		
		$this->loadView('contato/mensagem', $info);
	}
	
	
	function Enviar($dados){
		$mensagem = $dados['nome'].' <br/> '.$dados['email'].' <br/> '.$dados['mensagem'];
		if( mail('jardel@jardel.com', 'Contato', $mensagem) ){
			return true;
		}else{
			return false;
		}
		
	}
	
}