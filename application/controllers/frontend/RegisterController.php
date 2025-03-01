<?php
class RegisterController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ObjectModel');
    }

    public function index()
    {
        
        $data['title'] = 'Register';
        $data['active'] = 'register';
        $data['pendidikan_terakhir'] = $this->ObjectModel->get(['object_type'=>'1']);
        $data['sumber_informasi'] = $this->ObjectModel->get(['object_type'=>'2']);
        $this->renderpage('frontend/register', $data);
    }
}