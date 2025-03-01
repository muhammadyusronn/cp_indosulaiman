<?php
class AboutController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
        
        $data['title'] = 'About Us';
        $data['active'] = 'company';
        $this->renderpage('frontend/about', $data);
    }
}