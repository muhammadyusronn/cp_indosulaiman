<?php
class VisiController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
        
        $data['title'] = 'Visi & Misi';
        $data['active'] = 'company';
        $this->renderpage('frontend/visi', $data);
    }
}