<?php

/**
* Controller 4 : Helper format
*/

class Helper_format extends CI_Controller
{
	function preformat() 
	{
	    $this->load->helper('html');
	    $this->load->helper('text');

	    $data["judulapp"] = "Contoh Helper Format : displaypre()";
	    $data["programhello"] = "
	                    /* Hello World Program /*
	                    #include<stdio.h>
	                    main() {
	                      printf('Hello World')
	                    }";

	    $this->load->view('helper_format_text', $data);
	  }

	  function demomessage()
	  {
	    $this->load->helper('html');
	    $this->load->helper('text');

	    $data['judulapp'] = "Contoh Helper Format : showmessage()";
	    $data['errmessage'] = "Error!!!";
	    $data['warnmessage'] = "Warning!";
	    $data['normalmessage'] = "Just normal text, common text!";

	    $this->load->view('helper_format_message', $data);
	  }
}

?>