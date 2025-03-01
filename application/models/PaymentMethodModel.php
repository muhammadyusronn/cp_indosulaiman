<?php
class PaymentMethodModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'metode_bayar';
        $this->data['primary_key'] = 'id_metode';
    }
}
