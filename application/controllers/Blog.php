<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Blog extends CI_Controller
 {
    public function index()
    {
        get_header();
        get_sidebar();
        get_footer();    
    
    }
 }