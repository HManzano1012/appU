<?php

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("LoginModel");
    }

    public function Index()
    {
        $this->load->view('Login/LoginPage');
    }

    public function validarUsuario()
    {
        $strEmail = $this->input->post('email');
        $strClave = $this->input->post('password');
        $intNumeroRegistros = $this->LoginModel->verificarCuentaExiste($strEmail);

        if ($intNumeroRegistros->total > 0) {

            $strDBClave = $this->LoginModel->verificarClaveLogin($strEmail);
            
            if (password_verify($strClave, $strDBClave->clave)) {
                echo $strEmail;
            } else {
                echo "claveIncorrecta";
            }
        } else {
            echo "usuario no existe";
        }
    }

    public function crearCuenta($noErr = 0)
    {
        switch ($noErr){
            case '0':
                $data['info'] = array(
                    "code" => $noErr,
                    "message"=>""
                );
                break;
            case '1':
                $data['info'] = array(
                    "code" => $noErr,
                    "message"=>"El correo ya está asociado a otra cuenta"
                );
                break;
        }


        $this->load->view("Login/CrearCuenta",$data);
    }


    public function registrarUsuario(){
        $strEmail = $this->input->post('email');
        $strClave = $this->input->post('password');

        $intNumeroRegistros = $this->LoginModel->verificarCuentaExiste($strEmail);

        if ($intNumeroRegistros->total > 0) {
            $this->crearCuenta(1);
        } else {
            echo "usuario no existe";
        }
    }
}
