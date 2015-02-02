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

    public function	third() {
		echo "Third";
	}
	public function newfunc(){
	 echo "this will be my last function for the day";
	}
	
	public function lastone() {
		echo "Head out for the day";
		//commited by  vasu...under the Jayesh branch
	}
	
	public function finalone()
	{
	   echo "TRhis is final one";
	   //this is added by Jayesh
	}
	
	
	public function workedon()
	{
		$worked = "this changes are worked on 08-jan-2014";
	}
	
//This is added for the testing purpose	
// this is added by sathish;
//finally this is working.Thanks to all..
}

?>