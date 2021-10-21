<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class admin extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('date');
            $this->load->model('admin/admin_model');
            $this->load->library('form_validation');
         
			if (empty($this->session->user_id)){
                redirect('login');
            }
        }


		function news()
        {
            $data['titre'] = 'Actualites';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/news_view', $data);
            $this->load->view('admin/footer', $data);
        }

        function projet()
        {
            $data['titre'] = 'Projet';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/project_view', $data);
            $this->load->view('admin/footer', $data);
        }

        function concours()
        {
            $data['titre'] = 'Concours';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/test_view', $data);
            $this->load->view('admin/footer', $data);
        }

        function formation()
        {
            $data['titre'] = 'Formation';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/form_view', $data);
            $this->load->view('admin/footer', $data);
        }

        function cooperation()
        {
            $data['titre'] = 'Cooperation';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/coop_view', $data);
            $this->load->view('admin/footer', $data);
        }

        public function ajax_list_news()
        { 
			$list = $this->admin_model->datatables_news();
		
			$data = array();
			foreach ($list as $news) {
				$row = array();
				$row[] = '<p style="text-transform:uppercase;font-weight:600;">'.$news->titre.'</p>';
				$row[] = '<p style="text-transform:lowercase;">'.$news->description.'</p>';
				$row[] = $news->date;
                if ($news->creer_par != NULL)
				{
					$row[] = $this->admin_model->get_by_id_user($news->creer_par)->nom;
				}
				else
				{
					$row[] = 'Inconnu';
				}
				
				$row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_news('."'".$news->id."'".')"><i class="fa fa-edit"></i></a>';
				$row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_news('."'".$news->id."'".')"><i class="fa fa-trash"></i></a>';
	
				$data[] = $row;
			}
	
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->admin_model->get_all_news(),
				"recordsFiltered" => $this->admin_model->filter_data_news(),
				"data" => $data,
			);
			//output to json format
			echo json_encode($output);
	}

	public function ajax_edit_news($id)
	{
		$data = $this->admin_model->get_by_id_news($id);
		echo json_encode($data);
	}

	public function ajax_add_news()
	{
		$this->_validate_news();

		$titre = ucfirst(strtolower($this->input->post('titre')));
		$description = mb_strtolower($this->input->post('description'));
		$date = $this->input->post('date');

		$data = array(
			'titre' => $titre,
			'description' => $description,
			'date' => $date,
			'creer_par' => $this->session->userdata('user_id')
		);
		$this->admin_model->save_news($data);
		
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update_news()
	{
		$this->_validate_news();
		
		$titre = ucfirst(strtolower($this->input->post('titre')));
		$description = mb_strtolower($this->input->post('description'));
		$date = $this->input->post('date');
		$data = array(
			'titre' => $titre,
            'description' => $description,  
            'date' => $date
		);
		$this->admin_model->update_news($this->input->post('id'), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_news($id)
	{
        $this->admin_model->delete_by_id_news($id);
        echo json_encode(true);
	}


	private function _validate_news()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('titre') == '')
		{
			$data['inputerror'][] = 'titre';
			$data['error_string'][] = 'Le champ titre est requis';
			$data['status'] = FALSE;
		}
		

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'Le champ description est requis';
			$data['status'] = FALSE;
		}

        if($this->input->post('date') == '')
        {
            $data['inputerror'][] = 'date';
            $data['error_string'][] = 'Le champ date est requis';
            $data['status'] = FALSE;
        }
	
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


    public function ajax_list_projet()
    { 
        $list = $this->admin_model->datatables_projet();
    
        $data = array();
        foreach ($list as $news) {
            $row = array();
            $row[] = '<p style="text-transform:uppercase;font-weight:600;">'.$news->titre.'</p>';
            $row[] = '<p style="text-transform:lowercase;">'.$news->description.'</p>';
            $row[] = $news->date;
            if ($news->creer_par != NULL)
            {
                $row[] = $this->admin_model->get_by_id_user($news->creer_par)->nom;
            }
            else
            {
                $row[] = 'Inconnu';
            }
            
            $row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_news('."'".$news->id."'".')"><i class="fa fa-edit"></i></a>';
            $row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_news('."'".$news->id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin_model->get_all_projet(),
            "recordsFiltered" => $this->admin_model->filter_data_projet(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
}

public function ajax_edit_projet($id)
{
    $data = $this->admin_model->get_by_id_projet($id);
    echo json_encode($data);
}

public function ajax_add_projet()
{
    $this->_validate_news();

    $titre = ucfirst(strtolower($this->input->post('titre')));
    $description = mb_strtolower($this->input->post('description'));
    $date = $this->input->post('date');

    $data = array(
        'titre' => $titre,
        'description' => $description,
        'date' => $date,
        'creer_par' => $this->session->userdata('user_id')
    );
    $this->admin_model->save_projet($data);
    
    echo json_encode(array("status" => TRUE));
}

public function ajax_update_projet()
{
    $this->_validate_news();
    
    $titre = ucfirst(strtolower($this->input->post('titre')));
    $description = mb_strtolower($this->input->post('description'));
    $date = $this->input->post('date');
    $data = array(
        'titre' => $titre,
        'description' => $description,  
        'date' => $date
    );
    $this->admin_model->update_projet($this->input->post('id'), $data);
    echo json_encode(array("status" => TRUE));
}

public function ajax_delete_projet($id)
{
    $this->admin_model->delete_by_id_projet($id);
    echo json_encode(true);
}

public function ajax_list_test()
    { 
        $list = $this->admin_model->datatables_test();
    
        $data = array();
        foreach ($list as $news) {
            $row = array();
            $row[] = '<p style="text-transform:uppercase;">'.$news->titre.'</p>';
            $row[] = '<p style="">'.$news->description.'</p>';
            $dd = nice_date($news->date,'d/m/Y');
            $row[] = $dd;
            if ($news->arrete != NULL)
            {
                $row[] = '<a href="'.base_url('upload/'.$news->arrete).'" target="_blank" class="text-bold text-danger"><i class="fas fa-file-pdf"></i> Ouvrir</a>';
            }
            else
            {
                $row[] = 'Aucun fichier';
            }

            if ($news->fiche_inscription != NULL)
            {
                $row[] = '<a href="'.base_url('upload/'.$news->fiche_inscription).'" target="_blank" class="text-bold text-danger"><i class="fas fa-file-pdf"></i> Ouvrir</a>';
            }
            else
            {
                $row[] = 'Aucun fichier';
            }

            if ($news->resultat != NULL)
            {
                $row[] = '<a href="'.base_url('upload/'.$news->resultat).'" target="_blank" class="text-bold text-danger"><i class="fas fa-file-pdf"></i> Ouvrir</a>';
            }
            else
            {
                $row[] = 'Aucun fichier';
            }

            if ($news->creer_par != NULL)
            {
                $row[] = $this->admin_model->get_by_id_user($news->creer_par)->nom;
            }
            else
            {
                $row[] = 'Inconnu';
            }
            $row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_test('."'".$news->id."'".')"><i class="fa fa-edit"></i></a>';
            $row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_test('."'".$news->id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin_model->get_all_test(),
            "recordsFiltered" => $this->admin_model->filter_data_test(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
}


public function ajax_add_test()
        {
            $this->_validate_test();
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $date = $this->input->post('date');
            $data = array(
                'titre' => $titre,
                'description' =>$description,
                'date'	=> $date
            );
            $insert = $this->admin_model->save_test($data);
            if(!empty($_FILES['arrete']['name']) && $insert)
            {
                $upload = $this->upload_arrete();
                $data = array(
                    'arrete' => $upload
                );
                $this->admin_model->update_test($insert,$data);
                
            }

            if(!empty($_FILES['fiche_inscription']['name']) && $insert)
            {
                $upload = $this->upload_fiche_inscription();
                $data = array(
                    'fiche_inscription' => $upload
                );
                $this->admin_model->update_test($insert,$data);    
            }
    
            if(!empty($_FILES['resultat']['name']) && $insert)
            {
                $upload = $this->upload_resultat();
                $data = array(
                    'resultat' => $upload
                );
                $this->admin_model->update_test($insert,$data);    
            }

            echo json_encode(array("status" => TRUE));
        }


public function ajax_edit_test($id)
{
    $data = $this->admin_model->get_by_id_test($id);
    echo json_encode($data);
}


public function ajax_update_test()
{
    $this->_validate_test();
    
    $titre = ucfirst(strtolower($this->input->post('titre')));
    $description = mb_strtolower($this->input->post('description'));
    $date = $this->input->post('date');
    $data = array(
        'titre' => $titre,
        'description' => $description,  
        'date' => $date
    );
    #REMOVE FILES
    if($this->input->post('delete_arrete')) 
    {
        $id = $this->input->post('id');
        $arrete = $this->input->post('delete_arrete');
        if(file_exists('upload/'.$arrete))
        {
            unlink('upload/'.$arrete);
            $data = array(
                'arrete' => NULL
            );
        }
        else
        {
            $data = array(
                'arrete' => NULL
            );
        }
        
        $update = $this->admin_model->update_test($this->input->post('id'), $data); 
    }
    if($this->input->post('delete_fiche')) 
    {
        $id = $this->input->post('id');
        $fiche = $this->input->post('delete_fiche');
        if(file_exists('upload/'.$fiche))
        {
            unlink('upload/'.$fiche);
            $data = array(
                'fiche_inscription' => NULL
            );
        }
        else
        {
            $data = array(
                'fiche_inscription' => NULL
            );
        }
        $update = $this->admin_model->update_test($this->input->post('id'), $data);
    }

    if($this->input->post('delete_resultat')) 
    {
        $id = $this->input->post('id');
        $fiche = $this->input->post('delete_resultat');
        if(file_exists('upload/'.$fiche))
        {
            unlink('upload/'.$fiche);
            $data = array(
                'resultat' => NULL
            );
        }
        else
        {
            $data = array(
                'resultat' => NULL
            );
        }
        $update = $this->admin_model->update_test($this->input->post('id'), $data);
    }

    #END REMOVE

    #ADD FILES
    $update = $this->admin_model->update_test($this->input->post('id'), $data);
    
    if($update >= 0)
    {
        if(!empty($_FILES['arrete']['name']))
        {
            $arrete = $this->admin_model->get_arrete($this->input->post('id'));
            if($arrete  == NULL)
            {
                $upload = $this->upload_arrete();
                $data = array(
                    'arrete' => $upload
                );   
            }
            else
            {
                if(file_exists('upload/'.$arrete))
                {
                    unlink('upload/'.$arrete);
                    $upload = $this->upload_arrete();
                    $data = array(
                        'arrete' => $upload
                    );
                }
                else
                {
                    $upload = $this->upload_arrete();
                    $data = array(
                        'arrete' => $upload
                    );
                }
            }
            $this->admin_model->update_test($this->input->post('id'), $data);
        }

        if(!empty($_FILES['fiche_inscription']['name']))
        {
            $fiche = $this->admin_model->get_fiche($this->input->post('id'));
            if($fiche  == NULL)
            {
                $upload = $this->upload_fiche_inscription();
                $data = array(
                    'fiche_inscription' => $upload
                );   
            }
            else
            {
                if(file_exists('upload/'.$fiche))
                {
                    unlink('upload/'.$fiche);
                    $upload = $this->upload_fiche_inscription();
                    $data = array(
                        'fiche_inscription' => $upload
                    );
                }
                else
                {
                    $upload = $this->upload_fiche_inscription();
                    $data = array(
                        'fiche_inscription' => $upload
                    );
                }
            }
            $this->admin_model->update_test($this->input->post('id'), $data);
        }

        if(!empty($_FILES['resultat']['name']))
        {
            $fiche = $this->admin_model->get_resultat($this->input->post('id'));
            if($fiche  == NULL)
            {
                $upload = $this->upload_resultat();
                $data = array(
                    'resultat' => $upload
                );   
            }
            else
            {
                if(file_exists('upload/'.$fiche))
                {
                    unlink('upload/'.$fiche);
                    $upload = $this->upload_resultat();
                    $data = array(
                        'resultat' => $upload
                    );
                }
                else
                {
                    $upload = $this->upload_resultat();
                    $data = array(
                        'resultat' => $upload
                    );
                }
            }
            $this->admin_model->update_test($this->input->post('id'), $data);
        }

    }
    
    echo json_encode(array("status" => TRUE));
    #END ADD
}

public function ajax_delete_test($id)
{
    $arrete = $this->admin_model->get_arrete($id);
    $fiche = $this->admin_model->get_fiche($id);
    $resultat = $this->admin_model->get_resultat($id);
    if($arrete !== NULL)
    {
        if(file_exists('upload/'.$arrete))
        {
            unlink('upload/'.$arrete);
        }
    }
    if($fiche !== NULL)
    {
        if(file_exists('upload/'.$fiche))
        {
            unlink('upload/'.$fiche);
        }
    }
    if($resultat !== NULL)
    {
        if(file_exists('upload/'.$resultat))
        {
            unlink('upload/'.$resultat);
        }
    }
    $this->admin_model->delete_by_id_test($id);
    echo json_encode(true);
}



public function ajax_list_formation()
    { 
        $list = $this->admin_model->datatables_formation();
    
        $data = array();
        foreach ($list as $news) {
            $row = array();
            $row[] = '<p style="text-transform:uppercase;">'.$news->titre.'</p>';
            $row[] = '<p style="">'.$news->description.'</p>';
            $dd = nice_date($news->date,'d/m/Y');
            $row[] = $dd;
            if ($news->fiche_prospection != NULL)
            {
                $row[] = '<a href="'.base_url('upload/'.$news->fiche_prospection).'" target="_blank" class="text-bold text-danger"><i class="fas fa-file-pdf"></i> Ouvrir</a>';
            }
            else
            {
                $row[] = 'Aucun fichier';
            }

            if ($news->creer_par != NULL)
            {
                $row[] = $this->admin_model->get_by_id_user($news->creer_par)->nom;
            }
            else
            {
                $row[] = 'Inconnu';
            }
            $row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_formation('."'".$news->id."'".')"><i class="fa fa-edit"></i></a>';
            $row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_formation('."'".$news->id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin_model->get_all_formation(),
            "recordsFiltered" => $this->admin_model->filter_data_formation(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
}


public function ajax_edit_formation($id)
{
    $data = $this->admin_model->get_by_id_formation($id);
    echo json_encode($data);
}


public function ajax_add_formation()
        {
            $this->_validate_test();
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $date = $this->input->post('date');
            $data = array(
                'titre' => $titre,
                'description' =>$description,
                'date'	=> $date
            );
            $insert = $this->admin_model->save_formation($data);
            if(!empty($_FILES['fiche_prospection']['name']) && $insert)
            {
                $upload = $this->upload_prospection();
                $data = array(
                    'fiche_prospection' => $upload
                );
                $this->admin_model->update_formation($insert,$data);
                
            }

            echo json_encode(array("status" => TRUE));
        }



public function ajax_update_formation()
{
    $this->_validate_test();
    
    $titre = ucfirst(strtolower($this->input->post('titre')));
    $description = mb_strtolower($this->input->post('description'));
    $date = $this->input->post('date');
    $data = array(
        'titre' => $titre,
        'description' => $description,  
        'date' => $date
    );
    #REMOVE FILES
    if($this->input->post('delete_prospection')) 
    {
        $id = $this->input->post('id');
        $arrete = $this->input->post('delete_prospection');
        if(file_exists('upload/'.$arrete))
        {
            unlink('upload/'.$arrete);
            $data = array(
                'fiche_prospection' => NULL
            );
        }
        else
        {
            $data = array(
                'fiche_prospection' => NULL
            );
        }
        
        $update = $this->admin_model->update_formation($this->input->post('id'), $data); 
    }

    #END REMOVE

    #ADD FILES
    $update = $this->admin_model->update_formation($this->input->post('id'), $data);
    
    if($update >= 0)
    {
        if(!empty($_FILES['fiche_prospection']['name']))
        {
            $arrete = $this->admin_model->get_fiche_prospection($this->input->post('id'));
            if($arrete  == NULL)
            {
                $upload = $this->upload_prospection();
                $data = array(
                    'fiche_prospection' => $upload
                );   
            }
            else
            {
                if(file_exists('upload/'.$arrete))
                {
                    unlink('upload/'.$arrete);
                    $upload = $this->upload_prospection();
                    $data = array(
                        'fiche_prospection' => $upload
                    );
                }
                else
                {
                    $upload = $this->upload_prospection();
                    $data = array(
                        'fiche_prospection' => $upload
                    );
                }
            }
            $this->admin_model->update_formation($this->input->post('id'), $data);
        }

    }
    
    echo json_encode(array("status" => TRUE));
    #END ADD
}

public function ajax_delete_formation($id)
{
    $file = $this->admin_model->get_fiche_prospection($id);
    if($file  == NULL)
    {
        $this->admin_model->delete_by_id_formation($id);
    }
    else
    {
        if(file_exists('upload/'.$file))
        {
            unlink('upload/'.$file);
            $this->admin_model->delete_by_id_formation($id);
        }
        else
        {
            $this->admin_model->delete_by_id_formation($id);
        }
    }
    $this->admin_model->delete_by_id_formation($id);
    echo json_encode(true);
}


public function ajax_list_cooperation()
    { 
        $list = $this->admin_model->datatables_cooperation();
    
        $data = array();
        foreach ($list as $news) {
            $row = array();
            $row[] = '<p style="text-transform:uppercase;">'.$news->organe.'</p>';
            $row[] = '<p style="">'.$news->description.'</p>';
            $dd = nice_date($news->date,'d/m/Y');
            $row[] = $dd;

            if ($news->creer_par != NULL)
            {
                $row[] = $this->admin_model->get_by_id_user($news->creer_par)->nom;
            }
            else
            {
                $row[] = 'Inconnu';
            }
            $row[] = '<a class="btn  btn-primary" href="javascript:void(0)" title="Modifier" onclick="edit_cooperation('."'".$news->id."'".')"><i class="fa fa-edit"></i></a>';
            $row[] = '<a class=" btn  btn-danger" href="javascript:void(0)" title="Supprimer"  onclick="delete_cooperation('."'".$news->id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin_model->get_all_cooperation(),
            "recordsFiltered" => $this->admin_model->filter_data_cooperation(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
}


public function ajax_edit_cooperation($id)
{
    $data = $this->admin_model->get_by_id_cooperation($id);
    echo json_encode($data);
}


public function ajax_add_cooperation()
        {
            $this->_validate_test();
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $date = $this->input->post('date');
            $data = array(
                'organe' => $titre,
                'description' =>$description,
                'date'	=> $date
            );
            $insert = $this->admin_model->save_cooperation($data);
            echo json_encode(array("status" => TRUE));
        }



public function ajax_update_cooperation()
{
    $this->_validate_cooperation();
    
    $titre = ucfirst(strtolower($this->input->post('titre')));
    $description = mb_strtolower($this->input->post('description'));
    $date = $this->input->post('date');
    $data = array(
        'organe' => $titre,
        'description' => $description,  
        'date' => $date
    );    
    
    $update = $this->admin_model->update_formation($this->input->post('id'), $data); 
    echo json_encode(array("status" => TRUE));
}

public function ajax_delete_cooperation($id)
{
    $this->admin_model->delete_by_id_cooperation($id);
    echo json_encode(true);
}



        private function _validate_cooperation()
        {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('titre') == '')
            {
                $data['inputerror'][] = 'titre';
                $data['error_string'][] = 'Le champ organe est requis';
                $data['status'] = FALSE;
            }
            

            if($this->input->post('description') == '')
            {
                $data['inputerror'][] = 'description';
                $data['error_string'][] = 'Le champ description est requis';
                $data['status'] = FALSE;
            }

            if($this->input->post('date') == '')
            {
                $data['inputerror'][] = 'date';
                $data['error_string'][] = 'Le champ date est requis';
                $data['status'] = FALSE;
            }      

            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
	    }

        private function _validate_test()
        {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('titre') == '')
            {
                $data['inputerror'][] = 'titre';
                $data['error_string'][] = 'Le champ titre est requis';
                $data['status'] = FALSE;
            }
            

            if($this->input->post('description') == '')
            {
                $data['inputerror'][] = 'description';
                $data['error_string'][] = 'Le champ description est requis';
                $data['status'] = FALSE;
            }

            if($this->input->post('date') == '')
            {
                $data['inputerror'][] = 'date';
                $data['error_string'][] = 'Le champ date est requis';
                $data['status'] = FALSE;
            }      

            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
	    }

    


private function upload_arrete()
        {
            $config['allowed_types']        = 'pdf';
            $config['upload_path']          = './upload/';
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('arrete')) //upload and validate
            {

                $data['inputerror'][] = 'arrete';
                $data['error_string'][] = $this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                
                echo json_encode($data);
                exit();
            }
            $file_data = $this->upload->data();
            return $this->upload->data('file_name');
        }

        private function upload_fiche_inscription()
        {
            $config['allowed_types']        = 'pdf';
            $config['upload_path']          = './upload/';
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
    
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload('fiche_inscription')) //upload and validate
            {
    
                $data['inputerror'][] = 'fiche_inscription';
                $data['error_string'][] =$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                
                echo json_encode($data);
                exit();
            }
            $file_data = $this->upload->data();
            return $this->upload->data('file_name');
        }

        private function upload_resultat()
        {
            $config['allowed_types']        = 'pdf';
            $config['upload_path']          = './upload/';
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
    
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload('resultat')) //upload and validate
            {
    
                $data['inputerror'][] = 'resultat';
                $data['error_string'][] = $this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                
                echo json_encode($data);
                exit();
            }
            $file_data = $this->upload->data();
            return $this->upload->data('file_name');
        }

        private function upload_prospection()
        {
            $config['allowed_types']        = 'pdf';
            $config['upload_path']          = './upload/';
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
    
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload('fiche_prospection')) //upload and validate
            {
    
                $data['inputerror'][] = 'fiche_prospection';
                $data['error_string'][] = $this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                
                echo json_encode($data);
                exit();
            }
            $file_data = $this->upload->data();
            return $this->upload->data('file_name');
        }


    }

?>