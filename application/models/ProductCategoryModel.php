<?php
class ProductCategoryModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'kategori_produk';
        $this->data['primary_key'] = 'id';
    }

}