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
		
		$info =array();
		
		if(isset($_POST['salvar']) && $_POST['salvar'] == 'Cadastrar')
		{
			//submit
			//Curso
			$dados['id_curso'] = $_POST['id_curso'];
			
			//Aluno
			$dados['nome'] = $_POST['nome'];
			$dados['telefone'] = $_POST['telefone'];
			$dados['endereco'] = $_POST['endereco'];
			$dados['cpf'] = $_POST['cpf'];
			$dados['email'] = $_POST['email'];
			$dados['data_nascimento'] = $_POST['datanascimento'];
			$dados['responsavel'] = $_POST['responsavel'];

			
			require_once 'application/models/cursosModel.php';
			$cursoModel = new CursosModel();
			$resultado = $cursoModel->MatricularAluno($dados);
			
			if($resultado){
				$_SESSION['mensagem'] = 'Sucesso';
				header('location: /site/cursos');
			}else{
				$info['mensagem'] = 'Falha ao Cadastrar';
			}
			
		}

		$this->loadView('cursos/matricular',$info);
	}
}