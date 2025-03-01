<?php
class TransactionDetailModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'detail_transaksi';
        $this->data['primary_key'] = 'id';
    }

    public function updatedStatusMakanan($id_transaksi){
        $this->db->set('status_makanan', 1);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update($this->data['table_name']);
    }
}
