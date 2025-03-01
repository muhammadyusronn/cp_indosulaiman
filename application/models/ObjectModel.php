<?php
class ObjectModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'object';
        $this->data['primary_key'] = 'id';
    }
}
