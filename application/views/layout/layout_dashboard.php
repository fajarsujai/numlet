<?php

	$this->load->view('layout/dashboard/header');
	$this->load->view('layout/dashboard/topnav');
	if(stristr($_SERVER['REQUEST_URI'],'dashboard'))
	{
		$this->load->view('layout/dashboard/leftnav');
	}
	else {
		$this->load->view('layout/dashboard/leftnav2');	
	}
	$this->load->view($p_content);
	$this->load->view('layout/dashboard/footer');

?>