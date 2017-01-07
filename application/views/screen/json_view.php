<?php

	$this->output->set_status_header(200);
	$this->output->set_header('Content-type: application/json');
	echo json_encode($response);
?>