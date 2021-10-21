<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model
{
    var $table = 'utilisateur';
	var $column_order = array(null,'nom', null,null, null, null, null,null,null); //set column field database for datatable orderable
	var $column_search = array('nom','email'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_utilisateur' => 'asc','nom' => 'desc'); // default order 


	function query_user()  
    {  
        $this->db->select('*');
		$this->db->from($this->table);

		$i = 0;
		
		foreach ($this->column_search as $item) // loop column 
		{
			if(isset($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
    }  
    function datatables_user(){  
         $this->query_user();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_user(){  
         $this->query_user();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_user()  
    {  
         $this->db->select("*");  
		 $this->db->from($this->table);  
         return $this->db->count_all_results();  
    }  

	public function get_by_id($id)
	{    
		$this->db->select("*");  
        $this->db->from('utilisateur'); 
		$query = $this->db->get();
		return $query->row();
	}

	

	public function save_user($data)
	{
		$this->db->insert('utilisateur', $data);
		return $this->db->insert_id();
	}


	public function update($id, $user_data)
	{
		$this->db->where('id_utilisateur', $id);
		$this->db->update('utilisateur', $user_data);
		return $this->db->affected_rows();
	}


	public function delete_by_id($id)
	{
		$this->db->select('statut');
		$this->db->from($this->table);
		$this->db->where('id_utilisateur',$id);
		$statut_compte = $this->db->get();
		//var_dump($statut_compte);die();
		foreach($statut_compte->result() as $row)
		{
			if ($row->statut == '0')
			{
				$this->db->where('id_utilisateur', $id);
				$this->db->delete('utilisateur');
			}
			else
			{
				return false;
			}
		}

	}

	public function account_status($idU)
	{
		$output = '';
		$this->db->select('statut');
		$this->db->from($this->table);
		$this->db->where('id_utilisateur',$idU);
		$statut_compte = $this->db->get();
		foreach($statut_compte->result() as $row)
		{
			$output = $row->statut;
		}
		return $output;

	}

	public function unset_by_id($id)
	{
		$this->db->select('statut');
		$this->db->from($this->table);
		$this->db->where('id_utilisateur',$id);
		$statut_compte = $this->db->get();
		//var_dump($statut_compte);die();
		foreach($statut_compte->result() as $row)
		{
			if ($row->statut == '0')
			{
				$this->db->set('statut', '1');
				$this->db->where('id_utilisateur', $id);
				$this->db->update($this->table);
			}
			else
			{
				$this->db->where('id_utilisateur', $id);
				$this->db->set('statut', '0');
				$this->db->update($this->table);
			}
		}
	}

	public function get_by_email($email)
	{
		$this->db->from($this->table);
		$this->db->where('email',$email);
		$query = $this->db->get();

		return $query->row(0, 'array');
	}

	function authentifier($email,$password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query=$this->db->get('utilisateur');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}