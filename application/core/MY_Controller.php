<?php
/**
 * Description of MY_Controller
 *
 * @author Jayesh
 */
class MY_Controller extends CI_Controller {

    public $page_title        = '';
    public $current_controller;
    public $current_action;
    public $limit  = 20;
    public $page;
    public $offset;
    public $num_links               = 2;

    public function  __construct() {
        parent::__construct();
        $this->load_defaults();
    }
    /**
     * Method to load site wide deafult values
     * @author Jayesh ambali
     * 
     */
    public function load_defaults(){
        $this->page_title               = 'Sample App';
        $this->current_controller       = $this->router->class;
        $this->current_action           = $this->router->method;
    }
    /**
     * Method to display the result set
     * @author Jayesh ambali
     * @param <array> $data
     * @param <bool> $stop
     * @return  printed array result
     */
    public function print_results($data, $stop=true) {
        echo '<pre>';
        print_r($data);
        if($stop) {
            exit;
        }

    }

    /**
     * Method to create a random string
     * @author Jayesh ambali
     * @param <integer> $length
     * @return <string> random string
     */
    public function generate_random_string($length = 16) {
        $base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
        $max=strlen($base)-1;
        $activatecode='';
        mt_srand((double)microtime()*1000000);
        while (strlen($activatecode)< $length+1) {
            $activatecode.=$base{mt_rand(0,$max)};
        }
        return $activatecode;
    }
    /**
     * Method to return user id of logged in user
     * @author Jayesh ambali
     * @return <integer> user_id
     */
    public function user_id($prefix = '') {
        $user_id   = '';
        $user_data = $this->session->userdata('user_session');
        if(!empty($user_data)) {
            $user_id = $user_data[$prefix.'user_id'];
        }
        return $user_id;
    }
    /**
     * Method to return role id of logged in user
     * @author Jayesh ambali
     * @return <integer> role_id
     */
    public function role_id($prefix = '') {
        $role_id   = '';
        $user_data = $this->session->userdata('user_session');
        if(!empty($user_data)) {
            $role_id = $user_data[$prefix.'role_id'];
        }
        return $role_id;
    }
    /**
     * Method to return commonm file upload file
     * @author Jayesh ambali
     * @return <string> Path to upload
     */
    public function image_upload_path() {
        return  FCPATH.'public/uploads/';
    }

    /**
     * Method to create a random file name for uplaoding files
     * @author Jayesh ambali
     * @param <string> $image
     * @return <string> unique image file name
     */
    public function create_unique_file_name($image) {
        if(!empty($image)) {
            $image       = str_replace(' ', '_', $image);
            $file_name   = str_replace(' ', '', microtime()).$image;
            $rand_name   = substr($file_name, 2, strlen($file_name));
            return $rand_name;
        }
    }
    /**
     * Method to unlink a file
     * @author Jayesh ambali
     * @param <string> $file
     * @return <bool> true or false
     */
    public function unlink_old_avatar_image($file, $admin = false) {
        if($admin){
            $file = $this->admin_image_upload_path().'avatar/'.$file;
        }else{
            $file = $this->image_upload_path().'avatar/'.$file;
        }
        if(!is_dir($file)) {
            @unlink($file);
            return true;
        }
    }
    /**
     * Method to return MYSQL formated date
     * @author Jayesh ambali
     * @return <string>  formated date
     */
    public function current_time() {
        return date('Y-m-d H:i:s', time());
    }
    /**
     * Method to set the user data in session
     * @author Jayesh ambali
     * @param <type> $data
     * @return bool true or false
     */
    public function set_user_session_data($data, $prefix = '') {
        if(!empty($data)) {
            foreach($data as $authentication_data) {
                $user_id        = $authentication_data['user_id'];
                $role_id        = $authentication_data['role_id'];
                $username       = $authentication_data['username'];
            }
            $user_data      = array($prefix.'user_id'    => $user_id,
                                    $prefix.'role_id'    => $role_id,
                                    $prefix.'username'   => $username,
                              );
            $this->session->set_userdata('user_session', $user_data);
        }
    }
    
    /**
     * Method to check whether a form has been submitted or not
     * @author Jayesh ambali
     * @return <bool> true or false
     */
    public function is_post()
    {
        return isset($_POST) && !empty($_POST) ;
    }
    protected function prepare_pagination_defaults(){
        $this->page                     = (int) $this->input->get("page") ? (int) $this->input->get("page") : 1;
        $this->offset                   = $this->limit * ($this->page - 1);
        $config['base_url']             = base_url().$this->base_url; 
        $config['per_page']             = $this->limit;
        $config['num_links']            = $this->num_links;
        $config['next_link']            = 'Next &gt;';
        $config['prev_link']            = '&lt; Prev';
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers']     = TRUE;
        $config['first_link']           = '&lt; First';
        $config['last_link']            = 'Last &gt;';
        $config['first_tag_open']       = '<div class="first-page">';
        $config['first_tag_close']      = '</div>';
        $config['last_tag_open']        = '<div class="first-page">';
        $config['last_tag_close']       = '</div>';
        $config['next_tag_open']        = '<div class="first-page">';
        $config['next_tag_close']       = '</div>';
        $config['prev_tag_open']        = '<div class="first-page">';
        $config['prev_tag_close']       = '</div>';
        $config['cur_tag_open']         = '<div class="current_page">';
        $config['cur_tag_close']        = '</div>';
        $config['num_tag_open']         = '<div class="number_tags">';
        $config['num_tag_close']        = '</div>';
        $config['total_rows']           = $this->total_rows;
        $this->pagination->initialize($config);
    }
    public function process_ajax_results($data){
        echo json_encode($data);
        exit;
    }
    
   

}
?>
