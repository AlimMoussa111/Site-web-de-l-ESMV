<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class login extends CI_Controller 
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('admin/Login_model', 'Login');
            $this->load->helper('form');
            $this->load->library('form_validation');
        }
    
        public function index()
        {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[4]');
    
            if ($this->form_validation->run()) {
                $email = $this->input->post('email');
                $password = sha1($this->input->post('password'));
                if ($this->Login->authentifier($email, $password)) {
                    $user_data=$this->Login->get_user($email);
                    foreach($user_data->result() as $row)
                    {
                        $nom=$row->nom;
                        $statut=$row->statut;
                        $user_id=$row->id_utilisateur;
                    }
                    $user = array(
                        'nom' => $nom,
                        'user_id' => $user_id
                    );
                    if ($statut== '1')
                    {
                        $this->session->set_userdata($user);
                        redirect('user/index');
                    }
                    else
                    {
                        $data['msg'] = '<span class="text-light">Votre compte est désactivé</span>';
                        $this->load->view('login_view', $data);
                    }
                }
                else
                {
                    $data['msg'] = 'Login ou mot de passe incorrect!<br>';
                    $this->load->view('admin/login_view', $data);
                }
                
            } else {
                $this->load->view('admin/login_view');
            }
            
        }

        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url().'login');
        }

    }

?>