<?php
	class CursosModel extends Model{
		
		public function BuscarCursos(){
			$this->_tabela = "cursos";
			return $this->select();
		}
		
		//Model de cadastro
		public function MatricularAluno($dados){
			$copiaDados = $dados;
			
			unset($copiaDados['id_curso']);
			
			$this->_tabela = "aluno";
			$resultado = $this->insert($copiaDados);
			print_r($resultado);
			
			$dadosMatricula = array();
			$dadosMatricula['id_aluno'] = $resultado;
			$dadosMatricula['id_curso'] = $dados['id_curso'];
			$dadosMatricula['data_matricula'] = date('Y-m-d H:i:s');
			$dadosMatricula['status_pagamento'] = '1';
			
			$this->_tabela = "matricula";
			$resultado2 = $this->insert($dadosMatricula);
			print_r($resultado2);
			
			if($resultado2){
				return true;
			}else{
				return false;	
			}
		}
		
		
	}
	?>