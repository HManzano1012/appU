<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    public function verificarClaveLogin($correo){

        $this->db->where('is_deleted',0);
        $this->db->where('correo',$correo);
        $this->db->select('clave');
        $this->db->from("usuarios");
        return $this->db->get()->row();

    }

    public function verificarCuentaExiste($correo){

        $this->db->where('is_deleted',0);
        $this->db->where('correo',$correo);
        $this->db->select('count(*) as total');
        $this->db->select('is_verified');
        $this->db->from("usuarios");
        return $this->db->get()->row(); 

    }

    public function registrarUsuario($email,$pass){
        $arrDatosUsuario = array(
            "correo" => $email,
            "clave" => $pass,
            "tipo_usuario" => "user"
        );

        return $this->db->insert('usuarios', $arrDatosUsuario);
    }

    public function getUserInfo($email){

        $this->db->where('is_verified',1);
        $this->db->where('is_deleted',0);
        $this->db->where('correo',$email);
        $this->db->select('*');
        $this->db->from("usuarios");
        return $this->db->get()->row(); 
    }
}
