<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class main extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('main_model');
            $this->load->library('form_validation');
            $this->load->library("pagination");
            $this->load->helper('date');
        }

        public function index()
        {
            $data['titre'] = 'Page d\'accueil';
            $this->load->view('main_header', $data);
            $this->load->view('main_view', $data);
            $this->load->view('main_footer', $data);
        }

        public function connection()
        {
            $data['titre'] = 'Connection';
            $this->load->view('connection', $data);
        }

        public function cooperation()
        {
            $data['titre'] = 'Cooperation';
            $this->load->view('main_header', $data);
            $this->load->view('cooperation', $data);
            $this->load->view('main_footer', $data);
        }
        
        public function suite_info()
        {
            if (empty($this->uri->segment(3))){
                redirect('main/index');
            }
            $data['titre'] = 'Actualite';
            $data['full_info'] = $this->main_model->full_info($this->uri->segment(3));
            $this->load->view('main_header', $data);
            $this->load->view('suite', $data);
            $this->load->view('main_footer', $data);
        }

        public function all_news()
        {
            $data['titre'] = 'Actualite';
            $this->load->view('main_header', $data);
            $this->load->view('all_news', $data);
            $this->load->view('main_footer', $data);
        }

        
        public function us()
        {
            $data['titre'] = 'A propos';
            $this->load->view('main_header', $data);
            $this->load->view('us', $data);
            $this->load->view('main_footer', $data);
        }

        public function admission()
        {
            $data['titre'] = 'Admission';
            $this->load->view('main_header', $data);
            $this->load->view('admission', $data);
            $this->load->view('main_footer', $data);
        }


        public function etudiant()
        {
            $data['titre'] = 'Etudiant';
            $this->load->view('main_header', $data);
            $this->load->view('etudiant', $data);
            $this->load->view('main_footer', $data);
        }


        public function formation()
        {
            $data['titre'] = 'Formation';
            $this->load->view('main_header', $data);
            $this->load->view('formation', $data);
            $this->load->view('main_footer', $data);
        }

        public function concours()
        {
            $data['titre'] = 'Concours a l\'ESMV';
            $this->load->view('main_header', $data);
            $this->load->view('concours', $data);
            $this->load->view('main_footer', $data);
        }

        public function projet()
        {
            $data['titre'] = 'Projet';
            $this->load->view('main_header', $data);
            $this->load->view('projet', $data);
            $this->load->view('main_footer', $data);
        }

        function pagination_all_news()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_news();
            $config["per_page"] = 15;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_details($config["per_page"], $start)
            );
            echo json_encode($output);
        }   

        function pagination()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_news();
            $config["per_page"] = 4;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_details($config["per_page"], $start)
            );
            echo json_encode($output);
        }   


        function pagination_cooperation()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_cooperation();
            $config["per_page"] = 4;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_cooperation($config["per_page"], $start)
            );
            echo json_encode($output);
        }   

        function pagination_formation()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_formation();
            $config["per_page"] = 4;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_formation($config["per_page"], $start)
            );
            echo json_encode($output);
        }   

        function pagination_concours()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_concours();
            $config["per_page"] = 4;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_concours($config["per_page"], $start)
            );
            echo json_encode($output);
        }  
        
        function pagination_projet()
        {
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->main_model->count_all_projet();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            $config["use_page_numbers"] = TRUE;
            $config["full_tag_open"] = '<ul class="pagination">';
            $config["full_tag_close"] = '</ul>';
            $config["first_tag_open"] = '<li>';
            $config["first_tag_close"] = '</li>';
            $config["last_tag_open"] = '<li>';
            $config["last_tag_close"] = '</li>';
            $config['next_link'] = '&gt;';
            $config["next_tag_open"] = '<li>';
            $config["next_tag_close"] = '</li>';
            $config["prev_link"] = "&lt;";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "</li>";
            $config["cur_tag_open"] = "<li class='active'><a href='#'>";
            $config["cur_tag_close"] = "</a></li>";
            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";
            $config["num_links"] = 1;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            $start = ($page - 1) * $config["per_page"];

            $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'news_table'   => $this->main_model->fetch_projet($config["per_page"], $start)
            );
            echo json_encode($output);
        }   
     
    }