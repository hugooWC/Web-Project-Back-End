<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: *");

header("Access-Control-Allow-Headers: *");
class Controller {
	private $urlSegments;
	private $serviceProvider;
	
	function __construct() {
		if (!isset($_SERVER['PATH_INFO']) or $_SERVER['PATH_INFO']=='/' ) {
			$result = array();
			$result["status"] = "Error";
			$result["errcode"] = "100";
			$result["errmsg"] = "Please provide the parameters!";
			echo json_encode($result);
			exit;
		}
		
		
		$this->urlSegments = explode('/', $_SERVER['PATH_INFO']);
		array_shift($this->urlSegments);
		
		$resource = array_shift($this->urlSegments);
		$resource = ucfirst($resource);
		$serviceName = $resource.'Service';
		$serviceFilename = $resource.'Service'.'.php';
		
		if (file_exists($serviceFilename)) {
			require_once $serviceFilename;
			$this->serviceProvider = new $serviceName;
		} else {
			$result = array();
            $result["status"] = "Error";
            $result["errcode"] = "101";
            $result["errmsg"] = "Resource not found!";
            echo json_encode($result);
            exit; 
		}
	}
	
	function run() {
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$httpMethod = ucfirst(strtolower($httpMethod));
		$functionName = 'rest'.$httpMethod;
		
		$this->serviceProvider->$functionName($this->urlSegments);	
	}
}


$con = new Controller();
$con->run();
?>