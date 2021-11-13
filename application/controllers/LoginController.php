<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*----------------------------------------------*/
/* Class "LoginController"
/* Clase para el procesamiento de datos con respecto a validacion y 
/* asignacion de permisos al sistema en general.
/*----------------------------------------------*/


class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->auth_user) {
            redirect("MainController");
        }
        $this->load->model("LoginModel");
    }

    //Redirecciona a la pagina principal de Inicio de sesion
    public function Index($noErr = 0)
    {
        switch ($noErr) {
            case '0':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => ""
                );
                break;
            case '1':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => "Clave incorrecta"
                );
                break;
            case '2':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => "El correo no esta asociado a ninguna cuenta"
                );
                break;
            case '3':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => "El correo electronico aún no ha sido verificado"
                );
                break;
        }

        $this->load->view('Login/LoginPage', $data);
    }

    public function validarUsuario()
    {
        $strEmail = $this->input->post('email');
        $strClave = $this->input->post('password');
        $intNumeroRegistros = $this->LoginModel->verificarCuentaExiste($strEmail); //Cantidad de registros existentes con el correo ingresado

        //Verificamos si existe algun registro en la base  de datos con el correo ingresado
        if ($intNumeroRegistros->total > 0 && $intNumeroRegistros->is_verified == 1) {

            $strDBClave = $this->LoginModel->verificarClaveLogin($strEmail); // Clave guardada en DB

            //Se verifica si la clave coincide con la guardad en la base de datos
            if (password_verify($strClave, $strDBClave->clave)) {

                $arrInfoUsuario = $this->LoginModel->getUserInfo($strEmail);
                
                $arrUserInfo = array(
                    "auth_user" => true,
                    "id_usuario" => $arrInfoUsuario->id,
                    "email" => $arrInfoUsuario->correo,
                    "username" => $arrInfoUsuario->nombre . " " . $arrInfoUsuario->apellido,
                    "userRol" => $arrInfoUsuario->tipo_usuario,
                    "profileCompleted" => $arrInfoUsuario->profile_completed
                );
                
                $this->session->set_userdata($arrUserInfo);

                redirect("MainController");
            } else {
                $this->Index(1);
            }
        } elseif ($intNumeroRegistros->total > 0 && $intNumeroRegistros->is_verified == 0) {
            $this->Index(3);
        } elseif ($intNumeroRegistros->total == 0) {
            $this->Index(2);
        }
    }

    public function crearCuenta($noErr = 0)
    {
        switch ($noErr) {
            case '0':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => ""
                );
                break;
            case '1':
                $data['info'] = array(
                    "code" => $noErr,
                    "message" => "El correo ya está asociado a otra cuenta"
                );
                break;
        }


        $this->load->view("Login/CrearCuenta", $data);
    }

    public function registrarUsuario()
    {
        $strEmail = $this->input->post('email');
        $strClave = $this->input->post('password');

        $intNumeroRegistros = $this->LoginModel->verificarCuentaExiste($strEmail);

        if ($intNumeroRegistros->total > 0) {
            $this->crearCuenta(1);
        } else {
            $boolIsRegistred = $this->LoginModel->registrarUsuario($strEmail, password_hash($strClave, PASSWORD_DEFAULT));
            if ($boolIsRegistred) {
                echo "usuario_registrado";
            } else {
                echo "Usuario no registrado";
            }
        }
    }
}
