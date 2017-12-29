<!-- View 54 : Web Sederhana dengan jQuery => Layout -->

<?php

$data["dummy"] = "dummy";

$this->load->view("ajax/demojquery/v_jquery_head", $data);
$this->load->view($dview."_event", $data);
$this->load->view("ajax/demojquery/v_jquery_judul", $data);
$this->load->view("ajax/demojquery/v_jquery_menu", $data);
$this->load->view($dview, $data);
$this->load->view("ajax/demojquery/v_jquery_footer", $data);