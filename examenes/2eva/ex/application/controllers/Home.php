<?php

class Home extends CI_Controller
{

    public function principal()
    {
        error_reporting(0);
        frame($this,'home/principal');
        //$this->load->view('home/principal');
    }

    public function index()
    {
        $this->principal();
    }
}
?>