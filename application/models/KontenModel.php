<?php
class KontenModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'konten';
        $this->data['primary_key'] = 'id';
    }

    public function get_data_konten(){
        $this->db->SELECT('konten.*, jenis_konten.nama');
        $this->db->FROM('konten');
        $this->db->join('jenis_konten','jenis_konten.id = konten.jenis_konten');
        return $this->db->get()->result();
    }
}
