<?php 
class Errors extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
    $data = new stdClass;
    $data->code = "404 Not Found!";
    $data->error = "Page not found!";
    $this->output->set_status_header('404'); 
    $this->load->view('header');
    $this->load->view('error', $data);
    $this->load->view('footer');
 } 
 public function error404(){
    $data = new stdClass;
    $data->code = "404";
    $data->error = "Page not found!";
    $this->output->set_status_header('404'); 
    $this->load->view('header');
    $this->load->view('error', $data);
    $this->load->view('footer');
 }
} 