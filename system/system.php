<?php
	class System {
		private $url;
		private $parteUrl;
		public $controler,$action,$params;
		public function __construct(){
			$this->setUrl();
			$this->setParteUrl();
			$this->setControler();
			$this->setAction();
		}
		public function setUrl(){
			$this->url= (isset($_GET['url'])? $_GET['url'] :'dashboard/index');
		}
		public function setParteUrl(){
			$this->parteUrl = explode('/',$this->url);
		}
		public function setControler(){
			$this->controler=$this->parteUrl[0];
		}
		public function setAction(){
			$this->action = (isset($this->parteUrl[1]) && trim($this->parteUrl[1]) != '' ) ? $this->parteUrl[1] : 'Index';
		}
		public function run(){
			//Adicionar a classe que vamos executar
			require ('./application/controllers/'. $this->controler .'.php');
			//Executar o controller
			$app = new $this->controler();
			//Executar o método
			$action= $this->action;
			$app->$action();
		}
	}