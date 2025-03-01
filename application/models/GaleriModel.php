<?php
class GaleriModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'galeri';
        $this->data['primary_key'] = 'id';
    }
}
