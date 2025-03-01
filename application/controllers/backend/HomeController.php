<?php
class HomeController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['token'] = $this->session->userdata('token');
       
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
        if($this->data['token']['level'] == '3'){
            redirect('transaction');
            die();
        }
    }
    public function index()
    {
        $detail = [];
        $data['title'] = 'Dashboard';
        $this->render('backend/dashboard', $data);
    }
}
