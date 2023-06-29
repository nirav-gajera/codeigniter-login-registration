<?php

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        
        $this->load->model('RegisterModel', 'register');
    }

    public function index() {
        
        if ($this->session->userdata('logged_in')) {
            redirect(base_url() . 'welcome');
        }
        $this->load->view('header');
        $this->load->view('register_page');
        $this->load->view('footer');
    }

    public function doRegister() {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_message('is_unique', 'Email already exists.');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'register');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'date_time' => date('Y-m-d H:i:s')
            ];
    
            $insert_data = $this->register->add_user($data);
    
            if ($insert_data) {
                //email
                $this->load->library('email');
    
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'sandbox.smtp.mailtrap.io';
                $config['smtp_port'] = '2525';
                $config['smtp_user'] = '**********c6e';
                $config['smtp_pass'] = '***********214';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
    
                $this->email->initialize($config);
    
                $this->email->from('nirav1@gmail.com', 'Nirav');
                $this->email->to($email);
    
                $this->email->subject('Registration Confirmation');
                // $this->email->message('Thank you for registering!');
                $message = 'Thank you for registering! <br><br> <a href="' . base_url('login') . '">click here</a> for log in.';
                $this->email->message($message);
    
                $this->email->send();
                
                $this->session->set_flashdata('msg', 'Successfully registered! Please check your email for confirmation. you can login now');
                redirect(base_url() . 'login');
            }
        }
    }
    
} 

