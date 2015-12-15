<?php
class News extends CI_Controller {

//This is Default function of controller
public function index() {
//Loading view file ci_sample_view.php
//$this->load->view('new');
echo "aaaa";
}

public function Hello() {
//Loading view file ci_sample_view.php
$this->load->view('hello');
}

}
?>
