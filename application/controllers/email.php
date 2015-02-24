<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Sends email with Gmail
 */

    
class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->view('newsletter');
    }
    
    
    function send()
    {
        
        /*
         * THE CONFIG STUFF CAN BE SET HERE OR IN A FILE
         * NAMED email.php IN THE CONFIG FOLDER
         * YOU HAVE TO MAKE THE FILE
         */
//        $config = Array(
//            
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'mileschick@gmail.com',
//            'smtp_pass' => 'SwtMGO2D60JEizXw9'
//        );
        
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('newsletter');
        }
        else 
        {
            // validation has passed. Now send the email
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            
            $this->load->library('email');
            $this->email->set_newline("\r\n");

            $this->email->from('mileschick@gmail.com', 'Admin');
            $this->email->to($email);
            $this->email->subject('Test Newsletter Sign Up');
            $this->email->message('You\'re now signed up for the email!');

            $path = $this->config->item('server_root');
            $file = $path.'/a_seniors/attachments/sendme.txt';

            $this->email->attach($file);

            if($this->email->send())
                {
                
                    echo "Test";
//                    sleep(3);
//                    redirect('http://localhost/a_seniors/index.php/site/index');

                }
                else
                {
                    show_error($this->email->print_debugger());
                }
        }
        

    }
}


?>