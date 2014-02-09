<?php
require_once 'init.php';

if(isset($_POST['submit'])){
	$app_id = $_POST['app_id'];
	$apptitle = (empty($_POST['prtitle']))?$_POST['apptitle']:$_POST['prtitle'];
	$apptitle = trim($apptitle);
	$category = $_POST['category'];
	$pricing  = $_POST['pricing'];
	$amount   = $_POST['amount'];
	$description = $_POST['description'];
	$website = $_POST['website'];
	$status = ($_POST['status']=="publish")?1:0;
	
	$application = new Application();
	$application->id = $app_id;
	$application->app_name = $apptitle;
	$application->category = $category;
	$application->price = $amount;
	$application->description = $description;
	$application->website = $website;
	$application->dev_id = $_SESSION['user_id'];
	$application->status = $status;
	$application->upd_time = time();
	
	if($_FILES['apk_file']['size']!==0){
		//print_r($apk_file = $_FILES['apk_file']);
		
		$apk_target_dir = "../apks";
		$apk_tmp_file = $apk_file['tmp_name'];
		$apk_file_name = basename($apk_file['name']);
		$apk_final = str_replace(" ", "", $apptitle);
		$apk_type = $apk_file['type'];
		$apk_path = $apk_target_dir."/".$apk_final.".apk";
		chmod($apk_tmp_file, 0777);
		//chmod($apk_path, 0777);
		if(move_uploaded_file($apk_tmp_file, $apk_path)){
			
			$application->apk_path = $apk_final.".apk";
			
			
		}else{
			echo "an error occured while trying to upload.";
			//header('Location: error.php');
		}
	}else{
		$application->apk_path = $_POST['old_apk'];
	}
	if($application->update()){echo "updated";}else{echo "not updated";}
	$dis_app = Application::find_by_sql("SELECT * FROM `applications` WHERE `app_name`='{$apptitle}'");
	
	//screenshots
	if(isset($_FILES['shot'])){
		$shots = $_FILES['shot'];
		$scr_target_dir = "../screenshots";
		$i = 1;
		foreach($shots['error'] as $key=>$error){
			if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["shot"]["tmp_name"][$key];
	        $name = basename($_FILES["shot"]["name"][$key]);
			$scr_id = $_POST['scr_id'][$i-1];
			$ext = strrchr($name, ".");
			$dest_name = str_replace(" ", "", $apptitle)."_".$i.$ext;
			$i++;
			$destination = $scr_target_dir."/".$dest_name;
			chmod($tmp_name, 0777);
			//chmod($destination, 0777);
		        if(move_uploaded_file($tmp_name, $destination)){
		        	$screenshot = new Screenshot();
					$screenshot->id = $scr_id;
					$screenshot->name = $dest_name;
					$screenshot->app_id = $dis_app[0]->id;
					
					$screenshot->update();
					//
		        }else{
		        	echo "an error occured";
		        	//header('Location: error.php');
		        }
		    }
		}
	}
	$session->setMessage("Your app has been updated.");
	header('Location: ../all_apps_listing.php');
}else{
	
}

?>