<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * The main controller for the app store
 * developer console
 */
class Console extends CI_Controller {
	
	function index() {
		if(!$this->session_handler->is_logged_in()){
			header('Location: '.base_url().'console/login');
		}else{
			header('Location: '.base_url().'console/home');
		}
		
	}
	
	public function home(){
		$data['title'] = "LoveWorld App Store";
		if($this->session_handler->is_logged_in()){
			if(isset($this->session_handler->message)){
				$data['flashmessage'] = $this->session_handler->message;
			}
			if(isset($_GET['search']) && !empty($_GET['search'])){
				$key = urlencode($_GET['search']);
				$clause = "AND dev_id=".$this->db->escape($this->session_handler->user_id);
				$data['apps'] = $this->application->search($key, $clause);
			}else{
				$clause = "WHERE dev_id=".$this->db->escape($this->session_handler->user_id);
				$data['apps'] = $this->application->select_all($clause);
			}
			$data['this_user'] = $this->developer->find_by_id($this->session_handler->user_id);
			$this->load->view('all_apps_listing', $data);
		} else {
			$msg = "You must log in first.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: login');
			exit;
		}
		
	}
	
	public function login(){
		$data['title'] = "LoveWorld App Store | Log in";
		if(!$this->session_handler->is_logged_in()){
			$data['errmsg'] = "";
			if(isset($this->session_handler->message)){
				$data['flashmessage'] = $this->session_handler->message;
			}
			if(isset($_POST['login'])){
				$email = htmlentities(trim($_POST['email']));
				$pass = md5(trim($_POST['password']));
				
				
				if($user = $this->developer->authenticate($email, $pass)){
					if($this->session_handler->logIn($user)){
						header('Location: home');
						exit;
					}else{
						$data['errmsg'] = "Could not log you in.";
					}
					
				}else{
					$data['errmsg'] = "Incorrect e-mail/password.";
				}
			}
			$this->load->view('login', $data);
		}else{
			$msg = "You are already logged in.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: home');
		}
	}
	
	public function signup(){
		if(isset($_POST['name'])){
			$user = new Developer();
			$user->name = trim($_POST['name']);
			$user->email = trim($_POST['email']);
			$user->phone = trim($_POST['phone']);
			$user->address = trim($_POST['address']);
			$user->country = trim($_POST['country']);
			$user->state = trim($_POST['state']);
			$user->city = trim($_POST['city']);
			$password = trim($_POST['password']);
			$user->pass_hash = md5($password);
			$user->level = 1;
			
			if($user->create()){
				$this->session_handler->setFlashMessage("You have been successfully signed up.<br />Log in to continue.");
				header('Location: login');
			}else{
				$this->session_handler->setFlashMessage("Something went wrong and we could not sign you up.");
				header('Location: signup');
			}
		}else{
			if(isset($this->session_handler->message)){
				$data['flashmessage'] = $this->session_handler->message;
			}
			$this->load->model('useful');
			$data['country_list'] = $this->useful->country_list;
			$this->load->view('signup', $data);
		}
	}

	function add(){
		$data['title'] = "Add New App | LoveWorld App Store";
		if($this->session_handler->is_logged_in()){
			$this->load->helper('form');
			
			if(isset($this->session_handler->message)){
				$data['flashmessage'] = $this->session_handler->message;
			}
			$data['this_user'] = $this->developer->find_by_id($this->session_handler->user_id);
			$data['categories'] = $this->useful->categories();
			$this->load->view('add_app', $data);
		} else {
			$msg = "You must log in first.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: login');
			exit;
		}
	}
	
	function new_app(){
		if($this->session_handler->is_logged_in()){
			$application = new Application();
			$application->app_name = $this->input->post('apptitle', TRUE);
			$application->version = "";
			$application->description = $this->input->post('description', TRUE);
			$application->package_name = "";
			$application->cat_id = $this->input->post('category', TRUE);
			$application->price = (trim($this->input->post('amount'))=="")?0:$this->input->post('amount', TRUE);
			$application->upd_time = time();
			$application->website = $this->input->post('website', TRUE);
			$application->apk_path = "";
			$application->icon_path = "";
			$application->status = ($this->input->post('status')=="publish")?1:0;
			$application->dev_id = $this->input->post('dev_id');
			if($application->create()){
				$data['title'] = "Add | ".$application->app_name." | LoveWorld App Store";
				$this->session_handler->setFlashMessage("Your new application has been saved");
				$data['application'] = $application;
				$data['this_user'] = $this->developer->find_by_id($this->session_handler->user_id);
				$this->load->view('upload_app', $data);
			}else{
				$this->session_handler->setFlashMessage("Could not save your application.");
				header('Location: add');
			}
		} else {
			$msg = "You must log in first.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: login');
			exit;
		}
		#-------------------------------------------------
		#	Parse apk to extract package name and version
		#	echo "Parsing apk file...<br />";
		#-------------------------------------------------
		
			
	}

	function update(){
		if($this->session_handler->is_logged_in()){
			//$application = new Application();
			$app_id = $this->input->post('app_id');
			$app_name = $this->input->post('apptitle', TRUE);
			//$version = "";
			$description = $this->input->post('description', TRUE);
			//$package_name = "";
			$cat_id = $this->input->post('category', TRUE);
			$price = (trim($this->input->post('amount'))=="")?0:$this->input->post('amount', TRUE);
			$upd_time = time();
			$website = $this->input->post('website', TRUE);
			
			$status = ($this->input->post('status')=="publish")?1:0;
			$dev_id = $this->input->post('dev_id');
			
			$newdata = array(
				'app_name'=>$app_name,
				'description'=>$description,
				'cat_id'=>$cat_id,
				'price'=>$price,
				'upd_time'=>$upd_time,
				'website'=>$website,
				'status'=>$status,
				'dev_id'=>$dev_id
			);
			
			$this->db->where('id', $app_id);
			$this->db->update('applications', $newdata);
			
			if($this->db->affected_rows()!=false){
				$this->session_handler->setFlashMessage("Your application has been updated");
				$data['application'] = $application;
				$data['this_user'] = $this->developer->find_by_id($this->session_handler->user_id);
				header('Location: home');
			}else{
				$this->session_handler->setFlashMessage("Could not save your application.");
				header('Location: edit/'.$app_id);
			}
		} else {
			$msg = "You must log in first.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: login');
			exit;
		}
		#-------------------------------------------------
		#	Parse apk to extract package name and version
		#	echo "Parsing apk file...<br />";
		#-------------------------------------------------
		
			
	}
	 
	function uploadScreenshots($shots=""){
		if(!empty($_POST['ajax'])){
			$shots = $_FILES['shot'];
		}
		$app_id = $this->input->post('app_id');
		$title = (str_replace(" ", "", $this->input->post('title'))!="")?str_replace(" ", "", $this->input->post('title')):NULL;
		if(!empty($shots)){
			$i = 1;
			if(!empty($_POST['nushot'])){
				$count = $this->screenshot->count_all("WHERE `app_id`={$app_id}");
				$i = ($count['COUNT(*)'])+1;
			}
			foreach ($shots['error'] as $key => $value) {
				if($value==UPLOAD_ERR_OK){
					//continue
					$tmp_name = $shots['tmp_name'][$key];
					$name = basename($shots["name"][$key]);
					$name = str_replace(" ", "", $name);
					$ext = strtolower(strrchr($name, "."));
					if($ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif"){
						$uploaded[] = "Invalid image format.";
					}else{
						//continue
						if($title!=NULL){
							$dest_name = "scr_".$title."_".$i.$ext;
						}else{
							$dest_name = "scr_".$i.$ext;
						}
						$i++;
						$destination = "screenshots/".$dest_name;
						if(move_uploaded_file($tmp_name, $destination)){
							$uploaded[] = $dest_name;
							
							$screenshot = new Screenshot();
							$screenshot->name = base_url().$destination;
							$screenshot->app_id = $app_id;
							$screenshot->create();
							
							
							
						}
					}
				}else{
					$uploaded[] = $this->useful->upload_errors[$value];
				}
				
			}
		
			if(!empty($_POST['ajax'])){
				echo json_encode($uploaded);
			}
		}
	}

	function updateScreenshots(){
		if(!empty($_POST['ajax'])){
			$shots = $_FILES['shot'];
		}
		$title = (str_replace(" ", "", $this->input->post('title'))!="")?str_replace(" ", "", $this->input->post('title')):NULL;
		$app_id = $this->input->post('app_id');
		$scr_id = $this->input->post('scr_id');
		$oldscr = $this->input->post('oldscr');
		if(!empty($shots)){
			$i = 1;
			foreach ($shots['error'] as $key => $value) {
				if($value==UPLOAD_ERR_OK){
					//continue
					$tmp_name = $shots['tmp_name'][$key];
					$name = basename($shots["name"][$key]);
					$name = str_replace(" ", "", $name);
					$ext = strtolower(strrchr($name, "."));
					$oldext = strrchr($oldscr, ".");
					$start = (strpos($oldscr, $oldext)-1);
					$suffix = substr($oldscr, $start, 1);
					if($ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif"){
						$uploaded[] = "Invalid image format.";
					}else{
						//continue
						if($title!=NULL){
							$dest_name = "scr_".$title."_".$suffix.$ext;
						}else{
							$dest_name = "scr_".$suffix.$ext;
						}
						$i++;
						$destination = "screenshots/".$dest_name;
						
						if(move_uploaded_file($tmp_name, $destination)){
														
							$uploaded[] = $dest_name;
							$sql = "UPDATE `screenshots` SET `name`='".base_url().$destination."' WHERE `id`='{$scr_id}'";
							$this->db->query($sql);
						}else{
							$uploaded[] = "Upload failed.";
						}
					}
				}else{
					$uploaded[] = $this->useful->upload_errors[$value];
				}
				
			}
		
			if(!empty($_POST['ajax'])){
				echo json_encode($uploaded);
			}
		}
	}

	function deleteScreenshot($id){
		$scr = $this->screenshot->find_by_id($id);
		$location = basename($scr->name);
		$delete = $this->screenshot->delete($id);
		if($delete){
			unlink("screenshots/".$location);
			echo "success";
		}else{
			echo "failed";
		}
	}

	function uploadIcon($shots=""){
		if(!empty($_POST['ajax'])){
			$shots = $_FILES['app_icon'];
		}
		$title = (str_replace(" ", "", $this->input->post('title'))!="")?str_replace(" ", "", $this->input->post('title')):NULL;
		$app_id = $this->input->post('app_id');
		if(!empty($shots)){
			$i = 1;
			foreach ($shots['error'] as $key => $value) {
				if($value==UPLOAD_ERR_OK){
					//continue
					$tmp_name = $shots['tmp_name'][$key];
					$name = basename($shots["name"][$key]);
					$name = str_replace(" ", "", $name);
					$ext = strtolower(strrchr($name, "."));
					if($ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif"){
						$uploaded[] = "Invalid image format.";
					}else{
						//continue
						if($title!=NULL){
							$dest_name = "icon_".$title.$ext;
						}else{
							$dest_name = "icon_".$ext;
						}
						$i++;
						$destination = "icons/".$dest_name;
						
						if(move_uploaded_file($tmp_name, $destination)){
							chmod($destination, 0777);
							$this->resize->initialize($destination);
							
							$this->resize->resizeImage(150, 150, 'crop');
							$this->resize->saveImage($destination);
							
							$uploaded[] = $dest_name;
							$sql = "UPDATE `applications` SET `icon_path`='".base_url().$destination."' WHERE `id`='{$app_id}'";
							$this->db->query($sql);
						}
					}
				}else{
					$uploaded[] = $this->useful->upload_errors[$value];
				}
				
			}
		
			if(!empty($_POST['ajax'])){
				echo json_encode($uploaded);
			}
		}
	}

	function uploadApp($shots=""){
		if(!empty($_POST['ajax'])){
			$shots = $_FILES['apk_file'];
		}
		$app_id = $this->input->post('app_id');
		$title = (str_replace(" ", "", $this->input->post('title'))!="")?str_replace(" ", "", $this->input->post('title')):NULL;
		if(!empty($shots)){
			$i = 1;
			foreach ($shots['error'] as $key => $value) {
				if($value==UPLOAD_ERR_OK){
					//continue
					$tmp_name = $shots['tmp_name'][$key];
					$name = basename($shots["name"][$key]);
					$name = str_replace(" ", "", $name);
					$ext = strrchr($name, ".");
					if($ext!=".apk"){
						$uploaded[] = "Invalid apk format.";
					}else{
						//continue
						if($title!=NULL){
							$dest_name = "apk_".$title.$ext;
						}else{
							$dest_name = "apk_".$ext;
						}
						$i++;
						$destination = "apks/".$dest_name;
						if(move_uploaded_file($tmp_name, $destination)){
							$uploaded[] = $dest_name;
							$sql = "UPDATE `applications` SET `apk_path`='".base_url().$destination."' WHERE `id`='{$app_id}'";
							$this->db->query($sql);
						}else{
							$uploaded[] = "We could not upload your apk file for some reason.";
						}
					}
				}else{
					$uploaded[] = $this->useful->upload_errors[$value];
				}
				
			}
		
			if(!empty($_POST['ajax'])){
				echo json_encode($uploaded);
			}
		}
	}
	
	function edit($id){
		$app = $this->application->find_by_id($id);
		$data['title'] = "Edit | ".$app->app_name." | LoveWorld App Store";
		if($this->session_handler->is_logged_in()){
			$this->load->helper('form');
			if(isset($id)){
				//$id = $this->input->get('id', TRUE);
				$data['this_app'] = $this->application->find_by_id($id);
				if(isset($this->session_handler->message)){
					$data['flashmessage'] = $this->session_handler->message;
				}
				$data['this_user'] = $this->developer->find_by_id($this->session_handler->user_id);
				$data['categories'] = $this->useful->categories();
				$clause = "WHERE `app_id`={$id}";
				$data['screenshots'] = $this->screenshot->select_all($clause);
				$this->load->view('edit_app', $data);
			}
		}else{
			$msg = "You must log in first.";
			$this->session_handler->setFlashMessage($msg);
			header('Location: ../login');
			exit;
		}
	}
	
	function save(){
		$this->session_handler->setFlashMessage("Your application has been saved.");
		header('Location: home');
	}
	
	function test($id){
		$scr = $this->screenshot->find_by_id($id);
		echo basename($scr->name);
		echo "<pre>";
		print_r($scr);
		echo "</pre>";
	}
	
	function logout(){
		$this->session_handler->logout();
		header('Location: login');
	}
	
}