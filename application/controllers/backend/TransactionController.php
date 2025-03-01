<?php
class TransactionController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransactionModel');
        $this->load->model('TransactionDetailModel');

        $this->load->model('PaymentMethodModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        // $this->dump($this->TransactionModel->get_transaction_data());exit;
        $data['title'] = 'Data Transaksi';
        $cond = (!empty($_GET['start_date'])) ? [
            "DATE(created_date) >=" => $this->input->get('start_date'),
            "DATE(created_date) <=" => $this->input->get('end_date')
        ] : [];
        $data['transaction'] = $this->TransactionModel->get_data_join(['metode_bayar', 'status'], ['transaksi.metode_bayar = metode_bayar.id_metode', 'status.id_status=transaksi.status'], $cond);
        $this->render('backend/transaction/data-transaction', $data);
    }

    public function getById()
    {
        $data['title'] = 'Data Transaksi';
        $cond = ['transaksi.id_transaksi' => $this->input->get('id_transaksi')];
        $data['transaction'] = $this->TransactionModel->get_data_join(['metode_bayar', 'status'], ['transaksi.metode_bayar = metode_bayar.id_metode', 'status.id_status=transaksi.status'], $cond);
        $data['detail'] = $this->TransactionDetailModel->get_data_join(['produk'], ['detail_transaksi.id_produk = produk.id_produk'], ['id_transaksi' => $this->input->get('id_transaksi')]);
        $data['payment_method'] = $this->PaymentMethodModel->get();
        $this->render('backend/transaction/detail-transaction', $data);
    }

    public function update()
    {
        $act = $this->input->get('act');
        $id = $this->input->get('id');
        $status = $this->input->get('status');



        if ($status >= 3) {
            $this->flashmsg('FAILED! Invalid status!', 'danget');
            redirect('dash');
            die();
        }

        $this->db->trans_start();
        if ($act == 'menu') {
            $data_detail = [
                'status_makanan' => (int)$status + 1
            ];
            $update = $this->TransactionDetailModel->update($this->input->get('id'), $data_detail);
        } else if ($act == 'receipt') {
            $data = [
                'status' => (int)$status + 1
            ];
            $update = $this->TransactionModel->update($this->input->get('id'), $data);
        } else if ($act != 'receipt' || $act != 'menu') {
            $this->flashmsg('FAILED! Please check your data!', 'danger');
            redirect('dash');
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('FAILED! Please check your data!', 'danger');
            redirect('dash');
        } else {
            $this->flashmsg('SUCCESS! Transaction has been changed!', 'success');
            redirect('dash');
        }
    }

    public function paid()
    {
        $id = $this->input->get('id');
        $transaksi = $this->TransactionModel->get(['id_transaksi'=>$id]);
        if(COUNT($transaksi)<1){
            redirect('transaction');
        }
        $this->db->trans_start();
        $data = [
            'is_lunas' => 1
        ];
        $update = $this->TransactionModel->update($id, $data);

        $this->db->trans_complete();
        $this->send_wa($transaksi[0]->nomor_hp, $transaksi[0]->nama_pembeli, base_url('invoice?id_transaksi=').$id);
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('FAILED! Please check your data!', 'danger');
            redirect('transaction');
        } else {
            $this->flashmsg('SUCCESS! Transaction has been changed!', 'success');
            redirect('transaction');
        }
    }

    public function drop()
    {
        $id = $this->input->get('id');
        $check = $this->TransactionModel->get(['id_transaksi' => $id]);
        if (count($check) < 1) {
            $this->flashmsg('FAILED! Please check your data!', 'danger');
            redirect('transaction');
        }
        $this->db->trans_start();
        $delete = $this->TransactionModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('FAILED! Please check your data!', 'danger');
            redirect('transaction');
        } else {
            $this->flashmsg('SUCCESS! Transaction has been deleted!', 'success');
            redirect('transaction');
        }
    }
}
