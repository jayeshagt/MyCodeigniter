<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sample extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set_template('home');
    }

    public function index() {
        $this->template->write('title', $this->page_title . ' : Home');
        $this->template->write_view('content', 'frontend/home');
        $this->template->render();
    }
    public function second (){
        echo "here";
    }

    

}

?>