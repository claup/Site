<?php
class Cursos extends Controller
{
	public function index(){
		require_once 'application/models/cursosModel.php';
		
		$cursoModel = new CursosModel();
		
		$data['cursos'] = $cursoModel->BuscarCursos();
		
		$this->loadView('cursos/index', $data);
	}	
	
	public function matricular(){
		$this->loadView('cursos/matricular');
	}
}