<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albums extends CI_Controller
{
    
    
        public function addalb()
        {
               
                $this->load->model('Albums_model');
               
                $data['title']= 'Albums';
                $this->view->views('albums_view', $data);
                
              
        }
         
        public function addphoto()
        {
               
                $this->load->model('Albums_model');
                                               
                $data['alb'] = $this->Albums_model->getalbum();
                        
                $this->view->views('upload_img', $data);               
                 
              
        }
         
        public function all()
        {
               
                $this->load->model('Albums_model');
                                               
                $data['album'] = $this->Albums_model->getalbum();
                        
                $this->view->views('all_view', $data);               
                 
              
         }

        public function viewphoto()
        {
                       $id = $this->input->get('view_photo');
                       
                       $this->load->model('Albums_model');
                                                 
                        $data['photos'] = $this->Albums_model->getphoto();
                                         
                        if(empty($data['photos'])){
                         $err['mess'] = "This album is empty, you can add a photo!";     
                              $this->view->views('error_view', $err); 
                            
                        } else {
                           $this->view->views('view_photo', $data);               
                         
                         }
                          
         }
         

        public function upload_photo()
        {
           
                       $files = $_FILES;

                        $cpt = count ( $_FILES ['images'] ['name'] );
                        for($i = 0; $i < $cpt; $i ++) {
                    
                            $_FILES ['images'] ['name'] = $files ['images'] ['name'] [$i];
                            $_FILES ['images'] ['type'] = $files ['images'] ['type'] [$i];
                            $_FILES ['images'] ['tmp_name'] = $files ['images'] ['tmp_name'] [$i];
                            $_FILES ['images'] ['error'] = $files ['images'] ['error'] [$i];
                            $_FILES ['images'] ['size'] = $files ['images'] ['size'] [$i];
                            $this->load->library('upload');
                            $this->upload->initialize ( $this->set_upload_options () );
                            $e=$this->upload->do_upload ('images');
                            
                           
                        }
                         
                        if (!$this->upload->do_upload('images'))
                        {
                            $errors = $this->upload->display_errors();
                            $this->view->views('upload_img', $errors);
                        }
                        else
                        {
                             
                           If($this->input->post('add_album')){
                                      $data = array('upload_data' => $this->upload->data());
                                      
                                      $this->load->model('Albums_model');
                                      
                                      
                                      $this->Albums_model->add_album($data);
                                         
                                       
                                      $this->view->views('upload_success', $data);
                              
                           } elseif($this->input->post('add_photo')) {
                                      $data = array('upload_data' => $this->upload->data());
                              
                                      $this->load->model('Albums_model');
                                      
                                       
                                      $this->Albums_model->setphoto($data);
                                        
                                      $this->view->views('upload_success', $data);
      
                           } else {
                                      if($this->input->post('add_pic')){
                                       
                                        $data = $files ['images'] ['name'];
                                       
                                        $this->load->model('Albums_model');
                                        
                                         
                                        $this->Albums_model->setimg($data);
                                        
                                         $info = array('upload_data' => $this->upload->data());
                                                                      
                                        $this->view->views('upload_success', $info);
        
                                       }
                                  }
                            }
        }
  
                private function set_upload_options() {
                    // upload an image options
                $config['upload_path'] = './image/';        
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '1024';
                $config['max_width'] = '1920';
                $config['max_height'] = '1280';
            
               
                               
                    return $config;
                }
                 
      
        
        public function delete ()
        {
                if($this->input->post('delete')){
                        
                        $id = $this->input->post('checkbox');
                        $this->load->model('Albums_model');
                        $this->Albums_model->del_album($id);
                        redirect('albums/all');
                }
                if($this->input->post('deletephoto')){
                        
                        $id = $this->input->post('check');
                        $this->load->model('Albums_model');
                        $this->Albums_model->del_photo($id);
                        redirect('albums/all');   
                }
                    
                        
               
        }
}
