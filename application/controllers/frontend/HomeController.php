<?php
class HomeController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        
        $data['title'] = 'Home';
        $data['active'] = 'home';
        $this->renderpage('frontend/home', $data);
        
    }
}