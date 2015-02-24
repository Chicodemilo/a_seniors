<?php
class Email_model extends CI_Model{
    
    function send($email, $name, $subject, $message, $time){
        
            $data = array(
                    'name' => $name, 
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'time' => $time,);
        
            $this->load->library('email');
            
            $this->email->set_newline("\r\n");

            $this->email->from($email, $name);
            $this->email->to('miles@seniorsearchlight.com');
            $this->email->subject('Abilene Seniors Contact: '.$subject);
            $this->email->message($this->load->view('email/email_contact',$data, true));

//            $path = $this->config->item('server_root');
//            $file = $path.'/a_seniors/attachments/sendme.txt';

//            $this->email->attach($file);

            if($this->email->send())
                {
                    return true;
                }
                else
                {
                    return false;
                }
    }
    
    function send_b($email, $name, $subject, $message, $time){
        
            $data = array(
                    'name' => $name, 
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'time' => $time,);
        
            $this->load->library('email');
            
            $this->email->set_newline("\r\n");

            $this->email->from('do_not_reply@sanangeloseniors.com', 'Do No Reply');
            $this->email->to($email, $name);
            $this->email->subject('San Angelo Seniors Contact: '.$subject);
            $this->email->message($this->load->view('email/email_contact_b',$data, true));

//            $path = $this->config->item('server_root');
//            $file = $path.'/a_seniors/attachments/sendme.txt';

//            $this->email->attach($file);

            if($this->email->send())
                {
                    return true;
                }
                else
                {
                    return false;
                }
    }
                
}
?>