<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');	
	}

	public function index(){
		$data['mensaje'] ='';
		$this->load->view('login',$data);
	}

	public function ingresar(){
		$usuario = $this->input->post('txtUsuario');
		$password = sha1($this->input->post('txtPassword'));
		$respuesta = $this->LoginModel->ingresar($usuario,$password);
		if ($respuesta==1){
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('inicio');
			$this->load->view('layout/footer');
		}
		else{
			$data['mensaje'] ='Usuario o contraseña incorrectos';
			$this->load->view('login',$data);
		}
	}

	public function cerrarSesion()
	{
		$data['mensaje'] ='';
		$this->session->sess_destroy();
		$this->load->view('login',$data);
	}

	public function inicio(){
		if($this->session->userdata('idusuario')==null){
			redirect(LoginController);
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('inicio');
			$this->load->view('layout/footer');
		}
	}
}
