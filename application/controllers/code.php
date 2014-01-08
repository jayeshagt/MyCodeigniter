<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Code extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    }

	
	public function firstmethod()
	{
		$message = "Working with the help of GIT command prompt.."
	}
}
?>
