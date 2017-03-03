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
			$this->url= (isset($_GET['url'])? $_GET['url'] :'dashboad/index');
		}
		public function setParteUrl(){
			$this->parteUrl = explode('/',$this->url);
		}
		public function setControler(){
			$this->controler=$this->parteUrl[0];
		}
		public function setAction(){
			$this->action=$this->parteUrl[1];
		}
		public function run(){
			require ('./application/controllers/'. $this->controler .'.php');
			$app = new $this->controler();
			$action= $this->action;
			$app->$action();
		}
	}