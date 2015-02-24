<?php 


class Login extends CI_Controller
{
	
	function index()
	{	
		$this->load->view('edit/blank_header.php');
		$this->load->view('membership/login_form.php');
		$this->load->view('footer.php');
	}


	function validate_credentials()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		// $query = false;

		if($query){
			$this->load->model('user_model');
			$more_userdata = $this->user_model->info_for_session($this->input->post('username'));

			$data = array(
				'id' => $more_userdata[0]['id'],
				'username' => $this->input->post('username'),
				'is_logged_in' => true,
				'first_name' => $more_userdata[0]['first_name'],
				'last_login' => $more_userdata[0]['last_login'],
				'role' => $more_userdata[0]['role'],
				'hospital' => $more_userdata[0]['hospital']);

			// $data = array(
			// 	'is_logged_in' => true);


			$this->session->set_userdata($data);
			redirect('edit/');
		}else{
			// echo "No Way!!!";
			$this->index();
		}
	}



	function signup(){
		$this->load->view('edit/blank_header.php');
		$this->load->view('membership/signup_form.php');
		$this->load->view('footer.php');
	}

	function create_member(){
		$this->load->library('form_validation');

		//field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE){
			$this->signup();
		}else{
			$this->load->model('membership_model');
			if($query = $this->membership_model->create_member()){
				$this->load->view('edit/blank_header.php');
				$this->load->view('membership/signup_successful.php');
				$this->load->view('footer.php');
			}else{
				$this->load->view('edit/blank_header.php');
				$this->load->view('membership/problem_member.php');
				$this->load->view('footer.php');
			}
		}

	}

	function logout()
		{	
			date_default_timezone_set('America/Chicago');

			$time = date("Y-m-d H:i:s");
			$data = array('last_login' => $time);
			$name = $this->session->userdata('username');
			$this->db->where('username', $name);
			$this->db->update('membership', $data);


		    $this->session->sess_destroy();
		    // $this->index();
		    redirect(base_url()."login");
		}
}

 ?>