<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_controller
{
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