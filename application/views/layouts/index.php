<?php
$id = $this->session->userdata('uid');
require_once('_headScript.php');
require_once('_sidebar.php');
require_once('_navbar.php');
require_once('_header.php');
$this->load->view($content);
require_once('_footer.php');
require_once('_endScript.php');
