<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {


        public function index()
        {
                $this->load->model('Upload_model');
                
                $data['prof'] = $this->Upload_model->getprofile();
                
                $this->view->views('upload_view', $data);
                
               
         }

        public function do_upload()
        {
           
                $config['upload_path']          = './image/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                
                            
                if ( ! $this->upload->do_upload('images'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->view->views('upload_view', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        
                        $this->load->model('Upload_model');
                        
                        $this->Upload_model->setprofile($data);
                        
                        $data['prof'] = $this->Upload_model->getprofile();
                        
                         
                        $this->view->views('upload_success', $data);
                }           
                 
        }
        
         
        

                 
     
}
