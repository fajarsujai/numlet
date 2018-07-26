<?php

	$this->load->view('layout/dashboard/header');
	$this->load->view('layout/dashboard/topnav');
	$this->load->view('layout/dashboard/leftnav');
	$this->load->view($p_content);
	$this->load->view('layout/dashboard/footer');

?>