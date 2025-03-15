<?php
class PesertaController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaModel');
        $this->load->model('ObjectModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Peserta';
        $data['peserta'] = $this->PesertaModel->get_data_peserta();
        $this->render('backend/peserta/data-peserta', $data);
    }

    public function detail()
    {
        $id = $this->GET('id');
        $act = $this->GET('act');

        $data['title'] = 'Detail Peserta';
        $data['act'] = $act;
        $data['peserta'] = $this->PesertaModel->get_data_peserta_by_id($id);
        $this->render('backend/peserta/edit-peserta', $data);
    }

    public function drop()
    {
        $id = $this->GET('id');

        $this->db->trans_start();
        $delete = $this->PesertaModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('peserta');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('peserta');
        }
    }
}