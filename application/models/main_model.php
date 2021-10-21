<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_model extends CI_model
{

    function count_all_news()
    {
        $query = $this->db->get("actualite");
        return $query->num_rows();
    }

    function fetch_details($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("actualite");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <table class="table table-bordered table-striped">
        ';
        foreach($query->result() as $row)
        {
        $output .= '
        <tr >
            <td style="padding:10px;border-radius: 5px;margin: 0 5px;"><h7 class="titre-actualite" style="text-transform:capitalize">'.$row->titre.'</h7><br/>
            <p class="text-moving" >'.$row->description.'</p>
            <a href="'.base_url().'main/suite_info/'.$row->id.'" class="mybutton btn btn-sm btn-warning" style="color:white;"><i class="fas fa-play"></i> Lire la suite</a>
            </td>
            
        </tr>
        ';
        }
        $output .= '</table>';
        return $output;
    }

    function count_all_cooperation()
    {
        $query = $this->db->get("cooperation");
        return $query->num_rows();
    }

    function fetch_cooperation($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("cooperation");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <table class="table table-bordered table-striped">
        ';
        foreach($query->result() as $row)
        {
            $dd = nice_date($row->date,'d/m/Y');
        $output .= '
        <tr >
            <td style="padding:10px;border-radius: 5px;margin: 0 5px;"><h7 class="titre-actualite" style="text-transform:capitalize">'.$row->organe.' depuis '.$dd.'</h7><br/>
            <p class="text-moving" >'.$row->description.'</p>
            </td>
            
        </tr>
        ';
        }
        $output .= '</table>';
        return $output;
    }

    function count_all_formation()
    {
        $query = $this->db->get("formation");
        return $query->num_rows();
    }

    function fetch_formation($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("formation");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <table class="table table-bordered table-striped">
        ';
        foreach($query->result() as $row)
        {
            $dd = nice_date($row->date,'d/m/Y');
        $output .= '
        <tr >
            <td style="padding:10px;border-radius: 5px;margin: 0 5px;"><h7 class="titre-actualite" style="text-transform:capitalize">'.$row->titre.' depuis '.$dd.'</h7><br/>
            <p class="text-moving" >'.$row->description.'</p>
        ';
        }
        if($row->fiche_prospection !== '')
            {
                $output .= '<p class="text-moving" ><a target="_blank" href="'.base_url().'upload/'.$row->fiche_prospection.'"><i class="fas fa-file-pdf"></i> Prospectus</a></p>';
            }
        $output .= '  </td>
            
        </tr></table>';
        return $output;
    }

    function count_all_concours()
    {
        $query = $this->db->get("concours");
        return $query->num_rows();
    }

    function fetch_concours($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("concours");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <table class="table table-bordered table-striped">
        ';
        foreach($query->result() as $row)
        {
            $dd = nice_date($row->date,'d/m/Y');
            $output .= '
            <tr >
                <td style="padding:10px;border-radius: 5px;margin: 0 5px;"><h7 class="titre-actualite" style="text-transform:capitalize">'.$row->titre.' le '.$dd.'</h7><br/>
                <p class="text-moving" >'.$row->description.'</p>
            ';
            
            if($row->arrete != NULL)
            {
                $output .= '<p class="text-moving" ><a target="_blank" href="'.base_url().'upload/'.$row->arrete.'">Arrete : <i class="fas fa-file-pdf"></i> ouvrir le fichier</a></p>';
            }
            else
            {
                $output .= '<p class="text-moving" >Arrete :<span class="text-info"> Indisponible<span></p>';
            }
            if($row->fiche_inscription != NULL)
            {
                $output .= '<p class="text-moving" ><a target="_blank" href="'.base_url().'upload/'.$row->arrete.'">Fiche d\'inscription : <i class="fas fa-file-pdf"></i> ouvrir le fichier</a></p>';
            }
            else
            {
                $output .= '<p class="text-moving" >Fiche d\'inscription :<span class="text-info"> Indisponible<span></p>';
            }
            if($row->resultat != NULL)
            {
                $output .= '<p class="text-moving" ><a target="_blank" href="'.base_url().'upload/'.$row->resultat.'">Resultat : <i class="fas fa-file-pdf"></i> ouvrir le fichier</a></p>';
            }
            else
            {
                $output .= '<p class="text-moving" > Resultat :<span class="text-info"> Indisponible<span></p>';
            }
        }
        $output .= '  </td>
            
        </tr></table>';
        return $output;
    }

    function count_all_projet()
    {
        $query = $this->db->get("projet");
        return $query->num_rows();
    }

    function fetch_projet($limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("projet");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <table class="table table-bordered table-striped">
        ';
        foreach($query->result() as $row)
        {
        $output .= '
        <tr >
            <td style="padding:10px;border-radius: 5px;margin: 0 5px;"><h7 class="titre-actualite" style="text-transform:capitalize">'.$row->titre.'</h7><br/>
            <p class="text-moving" >'.$row->description.'</p>
            </td>
            
        </tr>
        ';
        }
        $output .= '</table>';
        return $output;
    }

    function full_info($id)
    {
        $this->db->select("*");
        $this->db->from("actualite");
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query;
    }
}