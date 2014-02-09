<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * The API's are the web services for the application
 */
class Apis extends CI_Controller {
	
	function index(){
		$this->load->view('api_docs');
	}
	
	function all_apps(){
		$data['applications'] = $this->application->select_all();
		$this->load->view('apis/all_apps', $data);
	}
	
	function app_data($id=""){
		if($id!=""){
			$data['application'] = $this->application->find_by_id($id);
			$data['screenshots'] = $this->screenshot->select_all("WHERE `app_id`={$id}");
			$this->load->view('apis/app_data', $data);
		}elseif(isset($_GET['id'])){
			$id = $_GET['id'];
			$data['application'] = $this->application->find_by_id($id);
			$data['screenshots'] = $this->screenshot->select_all("WHERE `app_id`={$id}");
			$this->load->view('apis/app_data', $data);
		}else{
			echo "send the application id as a parameter like so:<br/> <strong>app_data/1</strong><br />Or send a GET request of 'id' like so: <br /><strong>app_data?id=1</strong>";
		}	
	}
	
	function app_reviews($id=""){
		if($id!=""){
			$data['reviews'] = $this->review->select_all("WHERE `app_id`=".$this->db->escape($id));
			$this->load->view('apis/app_reviews', $data);
		}elseif(isset($_GET['app_id'])){
			$id = (int)$_GET['app_id'];
			$data['reviews'] = $this->review->select_all("WHERE `app_id`=".$this->db->escape($id));
			$this->load->view('apis/app_reviews', $data);
		}else{
			echo "send the application id as a parameter like so:<br/> <strong>app_reviews/1</strong><br />Or send a GET request of 'app_id' like so:<br /><strong>app_reviews?app_id=1</strong>";
		}
	}
	
	function cat_apps($cat_id=""){
		if($cat_id!=""){
			$data['applications'] = $this->application->select_all("WHERE `cat_id`=".$this->db->escape($cat_id));
			$this->load->view('apis/cat_apps', $data);
		}elseif(isset($_GET['cat_id'])){
			$cat_id = $_GET['cat_id'];
			$data['applications'] = $this->application->select_all("WHERE `cat_id`=".$this->db->escape($cat_id));
			$this->load->view('apis/cat_apps', $data);
		}else{
			$data['no_cat'] = TRUE;
			$data['cats']	= $this->db->get('categories');
			$this->load->view('apis/cat_apps', $data);
		}
	}
	
	function categories(){
		$data['cats']	= $this->db->get('categories');
		$this->load->view('apis/categories', $data);
	}
	
	function dev_apps($dev_id=""){
		if($dev_id!=""){
			$data['applications'] = $this->application->select_all("WHERE `dev_id`=".$this->db->escape($dev_id));
			$this->load->view('apis/dev_apps', $data);
		}elseif(isset($_GET['dev_id'])){
			$dev_id = $_GET['dev_id'];
			$data['applications'] = $this->application->select_all("WHERE `dev_id`=".$this->db->escape($dev_id));
			$this->load->view('apis/dev_apps', $data);
		}else{
			echo "send the developer id as a parameter like so:<br/> <strong>dev_apps/1</strong><br />Or send a GET request of 'dev_id' like so:<br /><strong>dev_apps?dev_id=1</strong>";
		}
	}
	
	function feature_banners(){
		$data['banners'] = $this->db->get('appbanners');
		$this->load->view('apis/feature_banners', $data);
	}
	
	function most_discussed($limit=""){
		if($limit!=""){
			$apps = $this->db->query("SELECT COUNT(`reviews`.`id`) 
				AS `numOfReviews`, `applications`.* 
				FROM `reviews` 
				LEFT JOIN `applications` 
				ON `reviews`.`app_id`=`applications`.`id` 
				GROUP BY `app_name` 
				ORDER BY `numOfReviews` DESC 
				LIMIT {$limit}");
			$data['applications'] = $apps->result();
			$this->load->view('apis/most_discussed', $data);
		}elseif(isset($_GET['limit'])){
			$limit = $_GET['limit'];
			$apps = $this->db->query("SELECT COUNT(`reviews`.`id`) 
				AS `numOfReviews`, `applications`.* 
				FROM `reviews` 
				LEFT JOIN `applications` 
				ON `reviews`.`app_id`=`applications`.`id` 
				GROUP BY `app_name` 
				ORDER BY `numOfReviews` DESC 
				LIMIT {$limit}");
			$data['applications'] = $apps->result();
			$this->load->view('apis/most_discussed', $data);
		}else{
			$apps = $this->db->query("SELECT COUNT(`reviews`.`id`) 
				AS `numOfReviews`, `applications`.* 
				FROM `reviews` 
				LEFT JOIN `applications` 
				ON `reviews`.`app_id`=`applications`.`id` 
				GROUP BY `app_name` 
				ORDER BY `numOfReviews` DESC");
			$data['applications'] = $apps->result();
			$this->load->view('apis/most_discussed', $data);
		}
			
	}
	
	function new_releases(){
		
	}
	
	function post_review(){
		if(isset($_POST['comment'])){
			$app_id = (int)$this->input->post('app_id', TRUE);
			$name = $this->input->post('name', TRUE);
			$rating = (int)$this->input->post('rating', TRUE);
			$summary = $this->input->post('summary', TRUE);
			$comment = $this->input->post('comment', TRUE);;
			$time_posted = time();
			
			$review = new Review();
			$review->app_id = $app_id;
			$review->user = $name;
			$review->rating = $rating;
			$review->summary = $summary;
			$review->message = $comment;
			$review->time_posted = $time_posted;
			
			if($review->create()){
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			echo "no request sent";
		}
	}
	
	function search($q=""){
		if($q!=""){
			$q = urldecode($q);
			$data['applications'] = $this->application->search($q);
			$this->load->view('apis/search', $data);
		}elseif(isset($_GET['q'])){
			$q = urldecode($_GET['q']);
			$data['applications'] = $this->application->search($q);
			$this->load->view('apis/search', $data);
		}else{
			echo "send the keyword or url-encoded phrase as a parameter like so:<br/> <strong>search/digital</strong><br />Or send a GET request of 'q' like so:<br /><strong>search?q=digital%20library</strong>";
		}
	}
	
	function top_downloads($limit=""){
		$clause = "";
		if(trim($limit)!=""){
			$clause = " LIMIT {$limit}";
		}elseif(isset($_GET['limit'])){
			$limit = (int)$_GET['limit'];
			$clause = " LIMIT {$limit}";
		}
		$sql = "SELECT * FROM `applications` ORDER BY `installs` DESC".$clause;
		$query = $this->db->query($sql);
		$data['applications'] = $query->result();
		$this->load->view('apis/top_downloads', $data);
	}
	
	function trending(){
		$clause = "WHERE `trend`=1";
		$data['applications'] = $this->application->select_all($clause);
		$this->load->view('apis/trending', $data);
	}
	
	function test(){
		$this->load->view('apis/test');
	}
}
