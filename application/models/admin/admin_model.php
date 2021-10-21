<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model
{
	var $column_order = array('id','titre', null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('titre','description'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc','titre' => 'desc'); // default order 


	var $column_order1 = array('id','titre', null,null,null,null); //set column field database for datatable orderable
	var $column_search1 = array('titre','description'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order1 = array('id' => 'desc','titre' => 'desc'); // default order 

    var $column_order2 = array('id','titre', null,null,null,null); //set column field database for datatable orderable
	var $column_search2 = array('titre','description'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order2 = array('id' => 'desc','titre' => 'desc'); // default order 

	var $column_order3 = array('id','titre', null,null,null,null); //set column field database for datatable orderable
	var $column_search3 = array('titre','description'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order3 = array('id' => 'desc','titre' => 'desc'); // default order 

	var $column_order4 = array('id','organe', null,null,null,null); //set column field database for datatable orderable
	var $column_search4 = array('organe','description'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order4 = array('id' => 'desc','titre' => 'desc'); // default order 

	function query_news()  
    {  
        $this->db->select('*');
		$this->db->from('actualite');

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
    function datatables_news(){  
         $this->query_news();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_news(){  
         $this->query_news();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_news()  
    {  
         $this->db->select("*");  
		 $this->db->from('actualite');
         return $this->db->count_all_results();  
    }  

	public function get_by_id_news($id)
	{    
		$this->db->select("*");  
        $this->db->from('actualite'); 
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

    public function get_by_id_user($id)
	{    
		$this->db->select("*");  
        $this->db->from('utilisateur'); 
		$this->db->where('id_utilisateur',$id);
		$query = $this->db->get();
		return $query->row();
	}

	

	public function save_news($data)
	{
		$this->db->insert('actualite', $data);
		return $this->db->insert_id();
	}


	public function update_news($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('actualite', $data);
		return $this->db->affected_rows();
	}


	public function delete_by_id_news($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('actualite');
	}

	
	function query_projet()  
    {  
        $this->db->select('*');
		$this->db->from('projet');

		$i = 0;
		
		foreach ($this->column_search1 as $item) // loop column 
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

				if(count($this->column_search1) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order1))
		{
			$order1 = $this->order1;
			$this->db->order_by(key($order1), $order1[key($order1)]);
		}
    }  
    function datatables_projet(){  
         $this->query_projet();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_projet(){  
         $this->query_projet();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_projet()  
    {  
         $this->db->select("*");  
		 $this->db->from('projet');
         return $this->db->count_all_results();  
    }  

	public function get_by_id_projet($id)
	{    
		$this->db->where('id',$id);
		$this->db->select("*");  
        $this->db->from('projet'); 
		$query = $this->db->get();
		return $query->row();
	}


	

	public function save_projet($data)
	{
		$this->db->insert('projet', $data);
		return $this->db->insert_id();
	}


	public function update_projet($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('projet', $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id_projet($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('projet');
	}
	

    function query_test()  
    {  
        $this->db->select('*');
		$this->db->from('concours');

		$i = 0;
		
		foreach ($this->column_search2 as $item) // loop column 
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

				if(count($this->column_search2) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order2))
		{
			$order2 = $this->order2;
			$this->db->order_by(key($order2), $order2[key($order2)]);
		}
    }  
    function datatables_test(){  
         $this->query_test();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_test(){  
         $this->query_projet();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_test()  
    {  
         $this->db->select("*");  
		 $this->db->from('concours');
         return $this->db->count_all_results();  
    }  

	public function get_by_id_test($id)
	{    
		$this->db->where('id',$id);
		$this->db->select("*");  
        $this->db->from('concours'); 
		$query = $this->db->get();
		return $query->row();
	}

	public function save_test($data)
	{
		$this->db->insert('concours', $data);
		return $this->db->insert_id();
	}


	public function update_test($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('concours', $data);
		return $this->db->affected_rows();
	}

	function get_arrete($id)
    {
         $file = '';
         $this->db->select('arrete');
         $this->db->from('concours');
         $this->db->where('id',$id);
         $query = $this->db->get();
         foreach($query->result() as $row)
         {
              $file = $row->arrete;
         }
         return $file;
    }

	function get_fiche($id)
	{
		$file = '';
		$this->db->select('fiche_inscription');
		$this->db->from('concours');
		$this->db->where('id',$id);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			$file = $row->fiche_inscription;
		}
		return $file;
	}

	function get_resultat($id)
	{
		$file = '';
		$this->db->select('resultat');
		$this->db->from('concours');
		$this->db->where('id',$id);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			$file = $row->resultat;
		}
		return $file;
	}



	public function delete_by_id_test($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('concours');
	}
	

	function query_formation()  
    {  
        $this->db->select('*');
		$this->db->from('formation');

		$i = 0;
		
		foreach ($this->column_search3 as $item) // loop column 
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

				if(count($this->column_search3) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order3))
		{
			$order3 = $this->order3;
			$this->db->order_by(key($order3), $order3[key($order3)]);
		}
    }  
    function datatables_formation(){  
         $this->query_formation();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_formation(){  
         $this->query_formation();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_formation()  
    {  
         $this->db->select("*");  
		 $this->db->from('formation');
         return $this->db->count_all_results();  
    }  

	public function get_by_id_formation($id)
	{    
		$this->db->where('id',$id);
		$this->db->select("*");  
        $this->db->from('formation'); 
		$query = $this->db->get();
		return $query->row();
	}

	public function save_formation($data)
	{
		$this->db->insert('formation', $data);
		return $this->db->insert_id();
	}


	public function update_formation($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('formation', $data);
		return $this->db->affected_rows();
	}


	function get_fiche_prospection($id)
	{
		$file = '';
		$this->db->select('fiche_prospection');
		$this->db->from('formation');
		$this->db->where('id',$id);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			$file = $row->fiche_prospection;
		}
		return $file;
	}

	public function delete_by_id_formation($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('formation');
	}
	

	function query_cooperation()  
    {  
        $this->db->select('*');
		$this->db->from('cooperation');

		$i = 0;
		
		foreach ($this->column_search4 as $item) // loop column 
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

				if(count($this->column_search4) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order4))
		{
			$order4 = $this->order4;
			$this->db->order_by(key($order4), $order4[key($order4)]);
		}
    }  
    function datatables_cooperation(){  
         $this->query_cooperation();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function filter_data_cooperation(){  
         $this->query_cooperation();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_cooperation()  
    {  
         $this->db->select("*");  
		 $this->db->from('cooperation');
         return $this->db->count_all_results();  
    }  

	public function get_by_id_cooperation($id)
	{    
		$this->db->where('id',$id);
		$this->db->select("*");  
        $this->db->from('cooperation'); 
		$query = $this->db->get();
		return $query->row();
	}

	public function save_cooperation($data)
	{
		$this->db->insert('cooperation', $data);
		return $this->db->insert_id();
	}


	public function update_cooperation($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('cooperation', $data);
		return $this->db->affected_rows();
	}


	public function delete_by_id_cooperation($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('cooperation');
	}
	




}