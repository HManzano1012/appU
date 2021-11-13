<?php

defined('BASEPATH') or exit('No direct script access allowed');
class MainModel extends CI_Model
{
    public function getDepartamentos()
    {
        return $this->db->get('departamentos');
    }
}
