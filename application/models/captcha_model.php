<?php

class Captcha_model extends CI_Model{
    function create_image(){
        
        $abc = array('1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');
            $count = count($abc);
            $word = '';
            $n = 0;
            while ($n < 6){
                $word .= $abc[mt_rand(0, 32)];
                $n++;
            }
            
            $captcha = array(
                'word' => $word,
                'img_path' => './captcha/',
                'img_url' => base_url().'captcha/',
                'font_path' => './fonts/impact.ttf',
                'img_width' => '200',
                'img_height' => '50',
                //exp in seconds...  3600 = one hour
                'expiration' => '3600',
                'time' => time()
            );

            $value = array(
                'time' => $captcha['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $captcha['word'],
            );
            
            $expire = $captcha['time'] - $captcha['expiration'];
            //delete expired captchas
            $this->db->where('time <', $expire);
            $this->db->delete('captcha');
            
            //insert valuse in captcha table
            $this->db->insert('captcha', $value);
            
            $img = create_captcha($captcha);
            
            return $data['image'] = $img['image'];
        
        
    }
    
}


?>