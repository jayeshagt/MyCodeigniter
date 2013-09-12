<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sample extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set_template('admin');
    }

    public function index() {
        $this->template->write('title', $this->page_title . ' : Administrator Home');
        $this->template->write_view('content', 'admin/home');
        $this->template->render();
    }

    

}

?>