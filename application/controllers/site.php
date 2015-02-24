<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
    
    }
    


	public function index()
	{   
	    $this->load->library('pagination');
	    $this->load->library('table');
            
            
	    $this->table->set_heading('ID', 'Name', 'Catetory One', 'Picture', 'Category Two', 'Category Three', 'Phone', 'Address', 'City', 'State');
	    $config['base_url'] = 'http://localhost/a_seniors/index.php/site/index';
	    $config['total_rows'] = $this->db->get('resources')->num_rows();
	    $config['per_page'] = 10;
	    $config['num_links'] = $config['total_rows'] / $config['per_page'];
	    $config['full_tag_open'] = '<div id="pagination">';
	    $config['full_tag_close'] = '</div>';
	    
	    $this->pagination->initialize($config);
	    
	    
	    $data['resources'] = $this->db->get('resources', $config['per_page'], $this->uri->segment(3));
	 
	    
	    

	    //$this->load->model('search', 'search_object');
	    
	    //$data = $this->search_object->get_all();
	    
	    //$data_array = array('data'=>$data);
	    
	    
	    $this->load->view('all_results', $data);
	    $this->load->view('search', $data);
	    
	    
	    
		$this->load->view('footer.html');
	}
	
        
        public function test(){
            $this->load->view('header.html');
            $this->load->view('footer.html');
        }

}

?>