<?php
class ContactController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Contact';
        $data['active'] = 'Contact';
        $this->renderpage('frontend/contact', $data);
    }
}
