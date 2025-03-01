<?php
class DetailProductModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'detail_produk';
        $this->data['primary_key'] = 'id_detail';
    }
}
