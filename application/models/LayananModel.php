<?php
class LayananModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'layanan';
        $this->data['primary_key'] = 'id';
    }
}
