<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class user extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('date');
            $this->load->model('admin/user_model');
            $this->load->library('form_validation');

         
			if (empty($this->session->user_id)){
                redirect('login');
            }
        }


		function index()
        {
            $data['titre'] = 'Comptes d\'utilisateurs';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/user_view', $data);
            $this->load->view('admin/footer', $data);
        }

        public function ajax_list()
        { 
			$list = $this->user_model->datatables_user();
		
			$data = array();
			foreach ($list as $user) {
				$row = array();
				$row[] = $user->nom;
				$row[] = $user->email;
				$row[] = ($user->statut == 1)?'Actif':'Inactif';
				if ($user->creer_par != NULL)
				{
					$row[] = $this->user_model->get_by_id($user->creer_par)->nom;
				}
				else
				{
					$row[] = 'Inconnu';
				}
				
	
				//add html for action
				if ($user->statut == 1)
				{
					$row[] = '<a style="margin-left:45px" class="btn btn-warning" href="javascript:void(0)"  title="Désactiver" onclick="unset_user('."'".$user->id_utilisateur."'".')"><i class="fa fa-times"></i></a>';
				}
				else
				{
					$row[] = '<a style="margin-left:45px" class="btn btn-warning" href="javascript:void(0)"   title="Activer" onclick="unset_user('."'".$user->id_utilisateur."'".')"><i class="fa fa-check"></i></a>';
				}
				$row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_user('."'".$user->id_utilisateur."'".')"><i class="fa fa-edit"></i></a>';
				$row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_user('."'".$user->id_utilisateur."'".')"><i class="fa fa-trash"></i></a>';
	
				$data[] = $row;
			}
	
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->user_model->get_all_user(),
				"recordsFiltered" => $this->user_model->filter_data_user(),
				"data" => $data,
			);
			//output to json format
			echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->user_model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$nom = ucfirst(strtolower($this->input->post('nom')));
		$email = mb_strtolower($this->input->post('email'));
		$password = sha1($this->input->post('password'));

		$user_data = array(
			'email' => $email,
			'nom' => $nom,
			'password' => $password,
			'creer_par' => $this->session->userdata('user_id')
		);
		$this->user_model->save_user($user_data);
		
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		
		$nom = ucfirst(strtolower($this->input->post('nom')));
		$email = mb_strtolower($this->input->post('email'));
		if ($this->input->post('change_psw') == 'yes') {
			$password = sha1($this->input->post('password'));
		}
		$user_data = array(
			'email' => $email
		);


		if ($this->input->post('change_psw') == 'yes') {
			$user_data['password']	= $password;
		}

		$this->user_model->update($this->input->post('id'), $user_data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$status = $this->user_model->account_status($id);
		if($status == 0)
		{
			//delete file
			$user = $this->user_model->get_by_id($id);
		
			$this->user_model->delete_by_id($id);
			echo json_encode(true);
		}
		else
		{
			echo json_encode(false);
		}
	}

	public function ajax_unset($id){
		$this->user_model->unset_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nom') == '')
		{
			$data['inputerror'][] = 'nom';
			$data['error_string'][] = 'Le champ Nom est requis';
			$data['status'] = FALSE;
		}
		

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Le champ Email est requis';
			$data['status'] = FALSE;
		}elseif(filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL) === false){
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Veuillez entrer une adresse email vailde';
			$data['status'] = FALSE;
		}else
		{
			if ($this->uri->segment(2) == 'ajax_add') {
				$user = $this->user_model->get_by_email($this->input->post('email'));

				if ($user != NULL)
				{
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'L\'adresse email n\'est pas disponible';
					$data['status'] = FALSE;
				}
			}
		}
		

		if ($this->input->post('change_psw') == 'yes') {

			if($this->input->post('password') == '')
			{
				$data['inputerror'][] = 'password';
				$data['error_string'][] = 'Le champ Mot de passe est requis';
				$data['status'] = FALSE;
			}

			if($this->input->post('password') != $this->input->post('password_conf')){
				$data['inputerror'][] = 'password';
				$data['error_string'][] = 'Les mots de passe ne correspondent pas';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

    }

?>