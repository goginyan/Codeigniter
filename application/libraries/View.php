<?php

class View {

        protected $CI;

        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

        public function views($content,$head=null, $data=array('title' => 'My CI Site'), $foot=null)
        {
                $this->CI->load->view('header_view',$head);
                $this->CI->load->view($content, $data);
                $this->CI->load->view('footer_view',$foot);
                
        }


}