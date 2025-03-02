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
}