<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('edit/upload_form', array('error' => ' '));
	}

	function upload_this($id){
		$this->load->view('edit/header.php');
		$this->load->view('edit/upload_form', array('error' => ' ', 'id' =>$id ));
		$this->load->view('footer.php');
	}

	function do_upload($id)
	{
		$config['upload_path'] = './resources/'.$id.'/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '4048';
		$config['max_width']  = '4024';
		$config['max_height']  = '1868';

		$this->load->view('edit/header.php');
		$this->load->library('upload', $config);
		$this->load->view('footer.php');

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors(), 'id' =>$id );

			$this->load->view('edit/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$file_name = $data['upload_data']['file_name'];
			$data = array('id' => $id, 'pic_name' => $file_name,);

			$this->load->model('edit_model');
			$insert = $this->edit_model->insert_edits($id, $data);
			
			redirect('edit/edit_this/'.$id);


			// $this->load->view('edit/upload_success', $data);
		}
	}

	public function delete_this($id){
			$file_name = '';
			$data = array('id' => $id, 'pic_name' => $file_name,);

			$this->load->model('edit_model');
			$insert = $this->edit_model->insert_edits($id, $data);

			redirect('edit/edit_this/'.$id);
	}




}
?>