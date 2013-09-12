<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

/**
 * Model class to manage the database table : user
 *
 * Available Methods:
 *
 *
 *
 * @author Jayesh
 */
class Sampleuser_model extends MY_Model {

    /**
     * 	Define table attributes
     */
    public $db_table    = "users";
    public $primary_key = "user_id";
    public $query_search;

    /**
     * 	Define all valid columns
     */
    public $valid_columns = array(
        "user_id", // int(11)
        "username", // varchar(255)
        "password", // varchar(255
        "email", // varchar(255)
        "role_id", //tinyint(1)
        "status"  //int(11)
    );

    public function __construct() {
        parent::__construct();
    }

    // --------------------------------------------------------------------
    // CREATE METHODS
    // --------------------------------------------------------------------

    /**
     * 	method to create a new user
     *
     * 	@param	array	An assoc array of data
     * 	@return	int   The new user_id
     */
    public function create_new_user($data = array()) {
        return $this->insert_data($data);
    }

    // --------------------------------------------------------------------
    // GET METHODS
    // --------------------------------------------------------------------

    /**
     * 	method to get a all users
     *
     * 	@author	jayesh
     *
     * 	@return	array	The array of data, or false if not found
     */
    public function get_all_users() {
        $this->db->from($this->db_table);
        $query = $this->db->get();

        /** / // For debugging.
          $this->dbg->last_query($this->db);
          $this->dbg->display($query->result_array()); exit;
          /* */
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    // --------------------------------------------------------------------

    /**
     * 	method to get a single user by user_id
     *
     * 	@author	jayesh
     *
     * 	@param	int The user_id
     * 	@return	array	The array of data, or false if not found
     */
    public function get_user_by_id($user_id) {
        $this->db->from($this->db_table);
        $this->db->where($this->primary_key, (int) $user_id);
        $query = $this->db->get();

        /** / // For debugging.
          $this->dbg->last_query($this->db);
          $this->dbg->display($query->result_array()); exit;
          /* */
        if ($query->num_rows == 1) {
            $data = $query->result_array();
            return $data[0];
        } else {
            return FALSE;
        }
    }

    

    // --------------------------------------------------------------------
    // SET METHODS
    // --------------------------------------------------------------------

    /**
     * 	method to update a user
     *
     * 	@author	jayesh
     *
     * 	@param	int The user id
     * 	@param	array	An assoc array of data
     * 	@return boolean	True on success, false on failure
     */
    public function set_user_data($user_id, $data = array()) {
        $where = array(
            $this->primary_key => (int) $user_id
        );
        return $this->set_data($where, $data);
    }

    // --------------------------------------------------------------------
    // DELETE METHOD
    // --------------------------------------------------------------------

    /**
     * 	method to delete a user
     *
     * 	@return	int   The user_id
     */
    public function delete_user($user_id) {
        $this->db->where($this->primary_key, $user_id);
        $this->db->delete($this->db_table);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}

?>
