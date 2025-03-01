<?php
class PengajuanModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'pengajuan';
        $this->data['primary_key'] = 'id';
    }
}
