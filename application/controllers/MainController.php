<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*----------------------------------------------*/
/* Class "LoginController"
/* Clase para el procesamiento de datos con respecto a validacion y 
/* asignacion de permisos al sistema en general.
/*----------------------------------------------*/


class MainController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth_user) {
            redirect("LoginController");
        }
        $this->load->model('MainModel');
    }

    public function Index(){
        $data['data'] = array(
            "title"=>"Principal"
        );

        $this->load->view("includes/header",$data);
        $this->load->view("Main/index");
    }

    public function configurarPerfil(){

        $arrDepartamentos = $this->MainModel->getDepartamentos();
        
        $data['data'] = array(
            "title"=>"Configurar Perfil",
            "departamentos"=>$arrDepartamentos
        );

        $this->load->view("includes/header",$data);
        $this->load->view("Main/ConfigurarPerfil");
    }

    public function LogOut(){
        $this->session->sess_destroy();
        redirect("MainController");
    }
}