<?php

class LoginModel extends CI_Controller
{
    public function verificarClaveLogin($correo){

        $this->db->where('correo',$correo);
        $this->db->select('clave');
        $this->db->from("usuarios");
        return $this->db->get()->row();

    }

    public function verificarCuentaExiste($correo){

        $this->db->where('correo',$correo);
        $this->db->select('count(*) as total');
        $this->db->from("usuarios");
        return $this->db->get()->row(); 

    }
}

?>