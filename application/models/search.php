<?php

class Search extends CI_Model{

    public function get_all(){
	$sql = "SELECT * FROM resources";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
    
    
    
    public function find($service){
//        $sql = "categoryone = '".$service."' OR categorytwo = '".$service."' OR categorythree = '".$service."'";
        
        $this->db->where("categoryone", $service);
        $this->db->or_where("categorytwo", $service);
        $this->db->or_where("categorythree", $service);
        $this->db->order_by("name", "asc");
        $results = $this->db->get("resources")->result_array();
        
        if(count($results) >= 1){
            return $results;
        }else{
            return FALSE;
        }
    }
    
    public function find_resource($id){

        $this->db->where('id', $id);
        $result = $this->db->get('resources')->result_array();
        
        if(count($result) >= 1){
            return $result;
        }  else {
            echo 'no resource';
            return FALSE;
        }
    }

    public function get_categories(){
        $this->db->select('categoryone');
        $this->db->select('categorytwo');
        $this->db->select('categorythree');
        
        // $this->db->distinct();
        
        $results = $this->db->get("resources")->result_array();
        return $results;
    }
    
   


}


?>