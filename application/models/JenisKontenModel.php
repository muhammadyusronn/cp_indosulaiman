<?php
class JenisKontenModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'jenis_konten';
        $this->data['primary_key'] = 'id';
    }
}
