<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('captcha');
        $this->load->model('captcha_model');
        $this->form_validation->set_error_delimiters('', '');
        
    }
    


	public function index()
	{   
                $this->load->view('header.php');
                
                $this->load->view('home_page.php');
	    
                $this->load->view('footer.php');
          
	}
        
        public function message(){
            
            $this->form_validation->set_rules('name', 'name','trim|strip_tags|xss_clean|required');
            $this->form_validation->set_rules('email', 'email','trim|strip_tags|xss_clean|required|valid_email');
            $this->form_validation->set_rules('subject', 'subject','trim|strip_tags|xss_clean|required');
            $this->form_validation->set_rules('message', 'message','trim|strip_tags|xss_clean|required');
            $this->form_validation->set_rules('captcha', 'captcha','trim|strip_tags|xss_clean|callback_captcha_check');
            
            if ($this->form_validation->run() === false){
                $data['image'] = $this->captcha_model->create_image();
                $this->load->view('header');
                $this->load->view('message_b.php', $data);
                $this->load->view('footer.php');
                }else{
                if ($this->input->post('message')){
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');
                    date_default_timezone_set('US/Central');
                    $time = date("m/d/Y H:i:s");
                    $comment = array(
                        
                        'name' => $name, 
                        'email' => $email,
                        'subject' => $subject,
                        'message' => $message,
                        'time' => $time,);
                    
                    $this->db->insert('comments', $comment);
                    $this->load->model('email_model', 'email_model');
                    
                    $sent = $this->email_model->send($email, $name, $subject, $message, $time);
                    $sent_b = $this->email_model->send_b($email, $name, $subject, $message, $time);
                    
                    if ($sent == true){
                                            
                        $this->load->view('header.php');

                        $this->load->view('sucess.php');

                        $this->load->view('footer.php');
                    
//                      header('Refresh: 2; URL='.base_url().'welcome/search');
                    }
                }
            }
        }
        
       
        public function captcha_check($value){
            if ($value == ''){
                $this->form_validation->set_message('captcha_check', 'Plese enter the text from the box above');
                return false;
            }else{
                $this->db->limit(1)->where("word", $value);
                $query = $this->db->get('captcha')->result_array();
                
                if(count($query) < 1 ){
                    $this->form_validation->set_message('captcha_check', 'The text did not match! Try again.');
                    return false;
                    
                }else{
                    return true;
                }
            }
        }

        



        public function search(){
            
            $this->load->view('header.php');

            
            
            $this->load->view('search.php');
            $x = base_url();
            
            $this->load->library('pagination');
    	    $this->load->library('table');
    	    $this->table->set_heading('ID', 'Name', 'Catetory One', 'Picture', 'Category Two', 'Category Three', 'Phone', 'Address', 'City', 'State');
    	    $config['base_url'] = $x.'/welcome/search/';
    	    $config['total_rows'] = $this->db->get('resources')->num_rows();
    	    $config['per_page'] = 20;
    	    $config['num_links'] = $config['total_rows'] / $config['per_page'];
    	    $config['full_tag_open'] = '<div id="pagination" class="pagination_numbers">';
    	    $config['full_tag_close'] = '</div>';
    	    
    	    $this->pagination->initialize($config);
    	    $this->db->order_by("categoryone", "asc");
    	    $data['resources'] = $this->db->get('resources', $config['per_page'], $this->uri->segment(3));

    	    //$this->load->model('search', 'search_object');
    	    
    	    //$data = $this->search_object->get_all();
    	    
    	    //$data_array = array('data'=>$data);
                
    	    $this->load->view('all_results', $data);
            $this->load->view('footer.php');
        }
        
        
        
        public function results(){
            $data['image'] = $this->captcha_model->create_image();
            $services = $this->input->get('need', TRUE);
            
            $this->load->model("search", "model");
            
            
            $results = $this->model->find($services);
            
            $data_array = array('data' => $results);
            
            $count = count($results);
            
            $counter = array('need' => $services, 'count' => $count);
            
            if($results){
                $this->load->view('header.php');
                $this->load->view('results_count.php', $counter);
                $this->load->view('results_view.php', $data_array);
                $this->load->view('footer.php');
            }else{
                $this->load->view('header.php');
                $this->load->view('search.php');
                $this->load->view('no_results.php', $counter);
                $this->load->view('footer.php');
            }
                    
        }
        
        public function resource($id){
//            $name = urldecode($name);
//            echo $name;
            $this->load->model('search', 'model');
            $data['image'] = $this->captcha_model->create_image();
            
            $resource = $this->model->find_resource($id);
            
            $resource_array = array('resource' => $resource);
            
            $this->load->view('results_header.php', $resource_array);
            
            $this->load->view('resource_page.php', $resource_array);
            
            $this->load->view('footer.php');
            
        }
        
        public function definition(){
            $this->load->view('header.php');
                
            $this->load->view('definition.php');
	    
            $this->load->view('footer.php');
        }

        


        


}

?>