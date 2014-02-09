<?php
    /*
    spl_autoload_register(function($className){
            include ( './lib/ApkParser/' . $className . ".php");
        });*/
    
	
	function __autoload($class_name){
		require_once('parser/lib/ApkParser/'.$class_name.'.php');
	}
