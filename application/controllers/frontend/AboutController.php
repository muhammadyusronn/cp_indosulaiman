<?php
class AboutController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KontenModel');
    }

    public function index()
    {
        
        $data['title'] = 'About Us';
        $data['active'] = 'company';
        $data['data'] = $this->KontenModel->get(['jenis_konten'=>'1']);
        $this->renderpage('frontend/about', $data);
    }
}