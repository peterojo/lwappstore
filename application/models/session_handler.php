<?php

class Session_handler extends CI_Model {
	private $loggedIn = false;
	public $user_id;
	public $message;
	
	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->checkMessage();
	}
	
	/**
	 * checks whether or not the user is logged in
	 */
	public function checkLogin(){
		if($this->session->userdata('user_id')){
			$this->user_id = $this->session->userdata('user_id');
			$this->loggedIn = true;
		}else{
			unset($this->user_id);
			$this->loggedIn = false;
		}
	}
	
	public function checkMessage(){
			if($this->session->flashdata('message')){
				$this->message = $this->session->flashdata('message');
				//unset($_SESSION['message']);
			}else{
				unset($this->message);
			}
		}
	
	public function is_logged_in(){
		return $this->loggedIn;
	}
	
	/**
	 * recieves a user object,
	 * logs the user in, shikena
	 */
	public function logIn($user_obj){
		if($user_obj){
			$this->session->set_userdata('user_id', $user_obj->id);
            $this->user_id = $this->session->userdata('user_id');
            $this->loggedIn = true;
			return TRUE;
        }
	}
	
	public function setFlashMessage($msg){
		$this->session->set_flashdata('message', $msg);
	}
	
	public function logout(){
		session_destroy();
        $this->session->unset_userdata('user_id');
        $this->loggedIn = false;
    }
}
