<?php
class ProjectController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
        
        $data['title'] = 'Project';
        $data['active'] = 'project';
        $this->renderpage('frontend/project', $data);
    }
}