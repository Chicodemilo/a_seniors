<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->form_validation->set_error_delimiters('', '');
        $this->is_logged_in();
        
    }


	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		// $session_name = $this->session->userdata('session_name');
		// $last_activity = $this->session->userdata('last_activity');

		// $header_data = array('is_logged_in' => $is_logged_in, 'session_name' => $session_name, 'last_activity' => $last_activity );
		// print_r($header_data);

		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('login/', 'refresh');
		}
	}



   	public function index($user_id = 0){
        $this->load->view('edit/header.php');

        $role = $this->session->userdata('role');
        $id = $this->session->userdata('id');

        if($role == 'admin'){
        	$hospital = 'all';
        }else{
        	$hospital = $this->session->userdata('hospital');
        	if($hospital == ''){
        		$hospital = 'none';
        	}
        }

        $this->load->model('edit_model');
        $resources = $this->edit_model->get_data($id, $hospital);
        $data = array('resources' => $resources);


        if($resources == false){
        	$this->load->view('edit/add.php');
        }else{
        	$this->load->view('edit/edit_resources.php', $data);
        }

        $this->load->view('footer.php');
    }





    public function delete_these(){
    	$this->load->view('edit/header.php');

    	foreach ($_POST as $key => $value) {
    		$import_data[] = $value;
    	}

    	// print_r($import_data);

    	$this->load->model('edit_model', 'delete_these');
    	$resources = $this->delete_these->delete_these($import_data);
        $data = array('resources' => $resources);

        // print_r($data);

    	$this->load->view('edit/delete_these.php', $data);
    	$this->load->view('footer.php');

    }



 	public function do_delete_these(){

    	foreach ($_POST as $key => $value) {
    		$import_data[] = $value;
    	}

    	// print_r($import_data);

    	$this->load->model('edit_model', 'do_delete_these');
    	$this->do_delete_these->do_delete_these($import_data);

    	redirect('edit/', 'refresh');

    }



    public function edit_this($id){

        $role = $this->session->userdata('role');

        if($role == 'admin'){
        	$hospital = 'all';
        }else{
        	$hospital = $this->session->userdata('hospital');
        	if($hospital == ''){
        		$hospital = 'none';
        	}
        }

        $this->load->model('search');
        $categories = $this->search->get_categories();

        $this->load->model('edit_model');
        $resources = $this->edit_model->get_resource($id);

        $data = array('resources' => $resources, 'categories' => $categories, 'id' => $id,);

        if($resources > 0){
        	if($hospital == 'all'){
        		$this->load->view('edit/header.php');
        		$this->load->view('edit/do_edit_this.php', $data);
        		$this->load->view('footer.php');
        	}else{

        		$check_hospital = $resources[0]['hospital'];
        		echo $check_hospital;

        		if($check_hospital != $hospital){
        			$this->load->view('edit/header.php');
        			$this->load->view('edit/not_yours.php');
        			$this->load->view('footer.php');
        		}else{
        			$this->load->view('edit/header.php');
        			$this->load->view('edit/do_edit_this.php', $data);
        			$this->load->view('footer.php');

        		}
        	}

        }else{
        	$this->load->view('edit/header.php');
        	$this->load->view('edit/no_resource.php');
        	$this->load->view('footer.php');
        }

    }

    public function submit_edit($id){

    	$data = array(
	    	'name' => $this->input->post('name'),
	    	'categoryone' => $this->input->post('categoryone'),
	    	'categorytwo' => $this->input->post('categorytwo'),
	    	'categorythree' => $this->input->post('categorythree'),
	    	'phone' => $this->input->post('phone'),
	    	'address' => $this->input->post('address'),
	    	'City' => $this->input->post('City'),
	    	'State' => $this->input->post('State'),
	    	'email' => $this->input->post('email'),
	    	'description' => $this->input->post('description'),
    	);

    	$this->load->model('edit_model');
    	$insert = $this->edit_model->insert_edits($id, $data);

    	redirect('edit/', 'refresh');

    }



    public function add($id){

        $role = $this->session->userdata('role');

        if($role == 'admin'){
        	$hospital = 'all';
        }else{
        	$hospital = $this->session->userdata('hospital');
        	if($hospital == ''){
        		$hospital = 'none';
        	}
        }

        $this->load->model('search');
        $categories = $this->search->get_categories();

        // print_r($categories);

        $all_categories[] = '';

        foreach ($categories as $category_row) {
        	
	        if($category_row['categoryone'] != ''){
	                array_push($all_categories, $category_row['categoryone']);
	            }

	            if($category_row['categorytwo'] != ''){
	                array_push($all_categories, $category_row['categorytwo']);
	            }

	            if($category_row['categorythree'] != ''){
	                array_push($all_categories, $category_row['categorythree']);
	            }
        }

        asort($all_categories);
        $all_categories = array_unique($all_categories);

        // print_r($all_categories);

        $data = array('categories' => $all_categories, 'id' => $id, 'hospital' => $hospital);


		$this->load->view('edit/header.php');
		$this->load->view('edit/add.php', $data);
		$this->load->view('footer.php');


    }


    public function submit_add($id){
    	$hospital = $this->session->userdata('hospital');

    	$area_code = $this->input->post('area_code');
    	$phone_pre = $this->input->post('phone_pre');
    	$phone_suf = $this->input->post('phone_suf');

    	$phone = '('.$area_code.') '.$phone_pre.'-'.$phone_suf;

    	$data = array(
	    	'name' => $this->input->post('name'),
	    	'categoryone' => $this->input->post('categoryone'),
	    	'categorytwo' => $this->input->post('categorytwo'),
	    	'categorythree' => $this->input->post('categorythree'),
	    	'phone' => $phone,
	    	'address' => $this->input->post('address'),
	    	'City' => $this->input->post('City'),
	    	'State' => $this->input->post('State'),
	    	'email' => $this->input->post('email'),
	    	'hospital' => $hospital,
	    	'description' => $this->input->post('description'),
    	);

    	$this->load->model('edit_model');
    	$insert = $this->edit_model->insert_new($data);

    	if($insert){
    		$this->load->view('edit/header.php');
			$this->load->view('edit/no_insert.php');
			$this->load->view('footer.php');
    	}else{
    		redirect('edit/');
    	}
    }



    public function custom_category($id){
        $data['id'] = $id;
        $this->load->view('edit/header.php');
        $this->load->view('edit/custom_category.php', $data);
        $this->load->view('footer.php');
    }







}


?>