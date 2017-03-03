<?php
	class CursosModel extends Model{
		
		public function BuscarCursos(){
			$this->_tabela = "cursos";
			return $this->select();
		}
	}
	?>