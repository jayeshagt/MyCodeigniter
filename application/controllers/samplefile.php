<?php
/*
* File created by Srinivasu for testing with GitHub apps..
* Created on 09/13/2013
* Location : Applications/Controller/Samplefile.php
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SampleFile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set_template('home');
    }

    public function index() {
        $this->template->write('title', $this->page_title . ' : Home');
        $this->template->write_view('content', 'frontend/home');
        $this->template->render();
    }
	
	public function githubexample() {
		echo "Just sample method";
	}
    
}

?>