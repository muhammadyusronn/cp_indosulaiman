<?php
class TransactionModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'transaksi';
        $this->data['primary_key'] = 'id_transaksi';
    }

    public function get_transaction_data()
    {
        $this->db->select('*');
        $this->db->join('metode_bayar', 'transaksi.metode_bayar = metode_bayar.id_metode');
        $this->db->join('status', 'status.id_status=transaksi.status');
        // $this->db->where($cond);
        return $this->db->get($this->data['table_name'])->result();
    }
}
