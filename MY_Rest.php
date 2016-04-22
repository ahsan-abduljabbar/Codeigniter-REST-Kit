<?php

  class MY_Rest extends CI_Controller {

    var $requestMethod;
    	  
		var $in;
		var $out;
		
		public function __construct() {
			
			parent::__construct();
			
			header('Content-Type: application/json');

      //

      $this->requestMethod = $this->input->server('REQUEST_METHOD');

		  // Input

			switch ($this->requestMethod) {

				case "POST":
						
					$this->in = $this->input->post();
							
					break;
						
				case "GET":
						
					$this->in = $this->input->get();
			
					break;
			
				case "PUT":
				case "DELETE":

					$this->in = parse_str(file_get_contents("php://input"));
			
					if(!$this->in) {
						
						$this->in = $_GET;
					
					}

					break;
			
			}
			
      // Output Template
      
      $this->out = array(
				
				"error"   => array("status" => false),
				"data"    => null
					
			);

      // Compress

      ob_start('ob_gzhandler');

		}
	  	
  }

