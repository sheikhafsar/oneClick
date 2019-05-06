<?php 
    function send_email($to,$subject,$message){
        $ci = &get_instance();
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'clicknpick0535@gmail.com';
        $config['smtp_pass'] = 'preorder11StoreManagement_13System28';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validate'] = TRUE; // bool whether to validate email or not      

        $ci->email->initialize($config);

        $ci->email->from('clicknpick0535@gmail.com', 'Click N Pick');
        $ci->email->to($to);

        $ci->email->subject($subject);
        $ci->email->message($message);

        if($ci->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
?>