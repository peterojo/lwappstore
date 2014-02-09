<?php

class Resize extends CI_Model {
	public $image;
	public $width;
	public $height;
	public $imageResized;
	//public static $filename = "filename";
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function initialize($filename){
		$this->filename = $filename;
		/*open up the file*/
		$this->image = $this->openImage($filename);
		
		/*Get the width and height*/
		$this->width = imagesx($this->image);
		$this->height = imagesy($this->image);
	}
	
	/**
	 * Opens up the image using a built-in function
	 * from the GD library
	 */
	public function openImage($file){
		/*Get the extension of the file*/
		#$file = strtolower($file);
		#$extension = substr($file, strpos($file, "."));
		$extension = strrchr($file, ".");
		
		switch ($extension) {
			case '.jpeg':
			case '.jpg':
				$img = imagecreatefromjpeg($file);
				break;
				
			case '.gif':
				$img = imagecreatefromgif($file);
				break;
				
			case '.png':
				$img = imagecreatefrompng($file);
				break;
			
			default:
				$img = FALSE;
				break;
		}
		return $img;
	}
	
	public function resizeImage($new_width, $new_height, $option="auto"){
		//get the optimal widht and height based on the $option value
		$optionArray = $this->getDimensions($new_width, $new_height, strtolower($option));
		
		$optimalWidth 	= $optionArray['optimalWidth'];
		$optimalHeight 	= $optionArray['optimalHeight'];
		
		//resample, i.e. create image canvas of above dimensions
		$this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
		imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);
		
		//if the option is 'crop', then we need to crop too
		if($option=='crop'){
			$this->crop($optimalWidth, $optimalHeight, $new_width, $new_height);
		}
	}
	
	private function getDimensions($newWidth, $newHeight, $option){  
	  
	   switch ($option)  
	    {  
	        case 'exact':  
	            $optimalWidth = $newWidth;  
	            $optimalHeight= $newHeight;  
	            break;  
	        case 'portrait':  
	            $optimalWidth = $this->getSizeByFixedHeight($newHeight);  
	            $optimalHeight= $newHeight;  
	            break;  
	        case 'landscape':  
	            $optimalWidth = $newWidth;  
	            $optimalHeight= $this->getSizeByFixedWidth($newWidth);  
	            break;  
	        case 'auto':  
	            $optionArray = $this->getSizeByAuto($newWidth, $newHeight);  
	            $optimalWidth = $optionArray['optimalWidth'];  
	            $optimalHeight = $optionArray['optimalHeight'];  
	            break;  
	        case 'crop':  
	            $optionArray = $this->getOptimalCrop($newWidth, $newHeight);  
	            $optimalWidth = $optionArray['optimalWidth'];  
	            $optimalHeight = $optionArray['optimalHeight'];  
	            break;  
	    }  
	    return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);  
	}  
	
	
	private function getSizeByFixedHeight($new_height){
		$ratio = $this->width / $this->height;
		$new_width = $new_height * $ratio;
		return $new_width;
	}
	
	private function getSizeByWidth($new_width){
		$ratio = $this->height / $this->width;
		$new_height = $new_width * $ratio;
		return $new_height;
	}
	
	private function getSizeByAuto($new_width, $new_height){
		if($this->height < $this->width){
			//this is a landscape image
			$optimalWidth  = $new_width;
			$optimalHeight = $this->getSizeByWidth($new_width);
		}else if($this->height > $this->width){
			//then this is a portrait image
			$optimalWidth  = $this->getSizeByFixedHeight($new_height);
			$optimalHeight = $new_height;
		}else{
			//image to be resized is a square
			if ($new_height < $new_width) {  
	            $optimalWidth = $new_width;  
	            $optimalHeight= $this->getSizeByFixedWidth($new_width);  
	        } else if ($new_height > $new_width) {  
	            $optimalWidth = $this->getSizeByFixedHeight($new_height);  
	            $optimalHeight= $new_height;  
	        } else {  
	            // Square being resized to a square  
	            $optimalWidth = $new_width;  
	            $optimalHeight= $new_height;  
	        }  
		}
		
		return array('optimalWidth'=>$optimalWidth, 'optimalHeight'=>$optimalHeight);
	}
	
	public function getOptimalCrop($new_width, $new_height){
		$heightRatio = $this->height/$new_height;
		$widthRatio  = $this->width/$new_width;
		
		if ($heightRatio < $widthRatio) {  
        	$optimalRatio = $heightRatio;  
	    } else {  
	        $optimalRatio = $widthRatio;  
	    }
	    
		$optimalHeight = $this->height / $optimalRatio;  
	    $optimalWidth  = $this->width  / $optimalRatio;  
	  
	    return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
	}
	
	
	private function crop($optimalWidth, $optimalHeight, $new_width, $new_height){
		//find the center
		$cropStartX = ($optimalWidth /2)-($new_width /2);
		$cropStartY = ($optimalHeight/2)-($new_height/2);
		
		$crop = $this->imageResized;
		
		//now crop from the center to the exact requested size
		$this->imageResized = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($this->imageResized, $crop, 0, 0, $cropStartX, $cropStartY, $new_width, $new_height, $new_width, $new_height);
	}
	
	public function saveImage($save_path, $image_quality="100"){
		//get the extension
		$extension = strrchr($save_path, ".");
		$extension = strtolower($extension);
		
		switch ($extension) {
			case '.jpg':
			case '.jpeg':
				if(imagetypes()&IMG_JPG){
					imagejpeg($this->imageResized, $save_path, $image_quality);
				}
				break;
			
			case '.gif':
				if(imagetypes()&IMG_GIF){
					imagegif($this->imageResized, $save_path);
				}
				break;
			
			case '.png':
				//scale quality from 0-100 to 0-9
				$scaleQuality = ($image_quality / 100) * 9;
				//invert quality so that 0 is the best
				$invertedScaleQuality = 9 - $scaleQuality;
				
				if(imagetypes()&IMG_PNG){
					imagepng($this->imageResized, $save_path, $invertedScaleQuality);
				}
				break;
			
			default:
				//if the extension is not one of the above then don't save
				break;
		}
		imagedestroy($this->imageResized);
	}
}
